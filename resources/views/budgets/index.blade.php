@extends('layout')

@section('title', __('models.budgets'))

@section('body')
    <div class="wrapper my-3">
        <div class="row">
            <div class="row__column row__column--middle">
                <h2>{{ __('models.budgets') }}</h2>
            </div>
            <div class="row__column row__column--compact row__column--middle">
                <a href="{{ route('budgets.create') }}" class="button">{{ __('actions.create') }} {{ __('models.budget') }}</a>
            </div>
        </div>

        <div class="box mt-3">
            @if (!count($budgets))
                <div class="box__section text-center">{{ __('general.empty_state', ['resource' => strtolower(__('models.budgets'))]) }}</div>
            @endif

            @foreach ($budgets as $budget)
                <div class="box__section d-flex justify-content-between align-items-center budget-flex">
                    <div class="budget-progreess">
                        <div v-pre>{{ $budget->tag->name }}</div>
                        <progress class="mt-2 mb-1" value="{{ $budget->spent }}" min="0" max="{{ $budget->amount }}"></progress>
                        <div style="font-size: 14px; font-weight: 600;">
                            {!! $currency !!} {{ $budget->formatted_spent }} {{ __('general.of') }} {!! $currency !!} {{ $budget->formatted_amount }}
                        </div>
                    </div>
                    <div>
                        <!-- Edit button -->
                        <button class="button button--small" onclick="openEditModal({{ $budget->id }}, {{ $budget->tag_id }}, {{ $budget->amount }})" title="{{ __('actions.edit') }}">
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="editModal" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="modal-close" onclick="closeEditModal()">&times;</span>
            <h3 style="margin-bottom: 25px">{{ __('actions.edit') }} {{ __('models.budget') }}</h3>
            <form id="editBudgetForm" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="budget_id" id="budget_id" value="{{ $budget->id ?? '' }}">

                <div class="form-group">
                    <label style=" margin-bottom: 10px;" for="tag_id">{{ __('models.tag') }}</label>
                    <select name="tag_id" id="tag_id" required>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label style=" margin-bottom: 10px;" for="amount">Amount</label> <br>
                    <input type="text" name="amount" id="amount" min="0" step="0.01" required />
                </div>

                <button type="submit" class="button" style="margin-top: 15px">Update</button>
            </form>
        </div>
    </div> 

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() { 
            $('#editBudgetForm').on('submit', function(e) {
                console.log('Form submit event triggered');
                e.preventDefault();

                const form = this; 
                const url = '/update/budget-value';  // fixed custom route

                let formData = new FormData(form);
                formData.append('_method', 'PUT'); // method override

                $.ajax({
                    url: url,
                    method: 'POST', // must be POST because of method override
                    data: formData,
                    processData: false,  // important for FormData
                    contentType: false,  // important for FormData
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                        'Accept': 'application/json'
                    },
                    success: function(response) { 
                        location.reload(); 
                    },
                    error: function(xhr) {
                        let errMsg = 'Failed to update budget';
                        if (xhr.responseJSON) {
                            if (xhr.responseJSON.message) {
                                errMsg = xhr.responseJSON.message;
                            } else if (xhr.responseJSON.errors) {
                                // If validation errors, join them
                                let errors = xhr.responseJSON.errors;
                                errMsg = Object.values(errors).flat().join('\n');
                            }
                        }
                        alert(errMsg);
                        console.error(xhr.responseJSON || xhr.responseText);
                    }
                });
            });
         });




        function openEditModal(id, tagId, amount) {
            const modal = document.getElementById('editModal');
            const form = document.getElementById('editBudgetForm');
            const selectTag = form.querySelector('#tag_id');
            const inputAmount = form.querySelector('#amount');  
            const inputBudgetId = form.querySelector('#budget_id'); // hidden input

            // Set form action URL with the correct budget id
            form.action = `/budgets/${id}`;

            // Set hidden input budget_id value for validation and ajax
            if (inputBudgetId) {
                inputBudgetId.value = id;
            } else {
                // If you don't have a hidden input for budget_id, create one dynamically
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'budget_id';
                hiddenInput.id = 'budget_id';
                hiddenInput.value = id;
                form.appendChild(hiddenInput);
            }

            // Set current tag and amount values in form
            selectTag.value = tagId;
            // inputAmount.value = amount;
            inputAmount.value = amount.toString().slice(0, -2);

            // Show modal (assuming CSS uses display:flex for showing)
            modal.style.display = 'flex';
        }


        function closeEditModal() {
            const modal = document.getElementById('editModal');
            modal.style.display = 'none';
        }

        // Close modal if user clicks outside modal-content
        window.onclick = function(event) {
            const modal = document.getElementById('editModal');
            if (event.target == modal) {
                closeEditModal();
            }
        }
    </script>
@endsection
