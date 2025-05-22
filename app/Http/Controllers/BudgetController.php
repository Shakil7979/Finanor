<?php

namespace App\Http\Controllers;

use App\Helper;
use App\Models\Tag;
use App\Repositories\BudgetRepository;
use App\Repositories\TagRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class BudgetController extends Controller
{
    public function __construct(
        private readonly BudgetRepository $budgetRepository,
        private readonly TagRepository $tagRepository
    ) {
    }
    

    public function index()
    {
        // Get active budgets
        $budgets = $this->budgetRepository->getActive();

        // Also get tags for the edit form select dropdown
        $tags = $this->tagRepository->getBySpace(session('space_id'));

        return view('budgets.index', [
            'budgets' => $budgets,
            'tags' => $tags,
        ]);
    }

    public function create()
    {
        $tags = $this->tagRepository->getBySpace(session('space_id'));

        return view('budgets.create', ['tags' => $tags]);
    }

    public function store(Request $request)
    {
        $request->validate($this->budgetRepository->getValidationRules());

        $user = Auth::user();
        $tag = $this->tagRepository->getById($request->tag_id);

        // if (!$user->can('view', $tag)) {
        //     throw ValidationException::withMessages(['tag_id' => __('validation.forbidden')]);
        // }

        if ($this->budgetRepository->doesExist(session('space_id'), $request->tag_id)) {
            return redirect()
                ->route('budgets.create')
                ->with('message', 'A budget like this already exists');
        }

        $amount = Helper::rawNumberToInteger($request->amount);
        $this->budgetRepository->create(session('space_id'), $request->tag_id, $request->period, $amount);

        return redirect()->route('budgets.index');
    }              

    public function update(Request $request, int $id)
    {
        $request->validate([
            'tag_id' => 'required|exists:tags,id',
            'amount' => 'required|numeric|min:0',
        ]);

        $user = Auth::user();
        $tag = $this->tagRepository->getById($request->tag_id);

        // Authorization check (optional for now)
        // if (!$user->can('view', $tag)) {
        //     throw ValidationException::withMessages(['tag_id' => __('validation.forbidden')]);
        // }

        $budget = $this->budgetRepository->findById($id);
        if (!$budget) {
            abort(404);
        }

        if ($this->budgetRepository->doesExist(session('space_id'), $request->tag_id, $id)) {
            if ($request->ajax()) {
                return response()->json([
                    'error' => 'Another budget with this tag already exists'
                ], 422);
            }
            return redirect()->route('budgets.index')
                ->with('message', 'Another budget with this tag already exists');
        }

        $amount = Helper::rawNumberToInteger($request->amount);

        $this->budgetRepository->update($budget, $request->tag_id, $request->period ?? $budget->period, $amount);

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => __('messages.budget_updated')]);
        }

        return redirect()->route('budgets.index')->with('success', __('messages.budget_updated'));
    }
    public function updateBudgetValue(Request $request)
    {
        $request->validate([
            'tag_id' => 'required|exists:tags,id',
            'amount' => 'required|numeric|min:0',
            'budget_id' => 'required|exists:budgets,id',
        ]);

        $budget = $this->budgetRepository->findById($request->budget_id);

        if (!$budget) {
            return response()->json(['error' => 'Budget not found'], 404);
        }

        $amount = Helper::rawNumberToInteger($request->amount);

        $this->budgetRepository->update($budget, $request->tag_id, $request->period ?? $budget->period, $amount);

        return response()->json(['success' => 'Budget updated successfully']);
    }


}
