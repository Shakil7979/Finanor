<!DOCTYPE html>
<html>
    <head>
        <title>{{ View::hasSection('title') ? View::getSection('title') . ' - ' . config('app.name') : config('app.name') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="stylesheet" href="/twemoji-flags.css" />
        <script defer src="https://pro.fontawesome.com/releases/v5.10.0/js/all.js" integrity="sha384-G/ZR3ntz68JZrH4pfPJyRbjW+c0+ojii5f+GYiYwldYU69A+Ejat6yIfLSxljXxD" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:400,400i,600,600i" />
        @if (View::hasSection('tailwind') && View::getSection('tailwind') == true)
            @vite('resources/assets/css/tailwind.css')
        @else
            @vite('resources/assets/sass/app.scss')
        @endif
        <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css" />
        <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png" />
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png" />
        <link rel="manifest" href="/site.webmanifest" />
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5" />
        <meta name="msapplication-TileColor" content="#da532c" />
        <meta name="theme-color" content="#ffffff" />
        <style>
            .ct-series-a .ct-slice-donut-solid {
                fill: #179BD1;
            }

            .ct-series-b .ct-slice-donut-solid {
                fill: #E4E8EB;
            }

            .ct-series-a .ct-line {
                stroke-width: 2px;
                stroke: #179BD1;
            }

            .theme-dark .ct-label {
                color: #758193;
            }

            [v-cloak] {
                display: none;
            }
        .noti_icon a {
            position: relative;
            display: inline-block;
        }

        .noti_icon span {
            background: red;
            width: 14px;
            height: 14px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            color: #fff;
            font-size: 10px;
            font-weight: bold;
            position: absolute;
            top: -6px;
            right: -8px;
            z-index: 10;
            box-shadow: 0 0 4px rgba(0,0,0,0.2);
        }

        .notification_content {
            position: absolute;
            background: #fff;
            width: 220px;
            padding: 15px 10px;
            border-radius: 8px;
            box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.1);
            top: 35px;
            right: 0;
            z-index: 9999; 
        }

        .notification_content ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .notification_content ul li {
            margin-bottom: 10px;
        }

        .notification_content ul li:last-child {
            margin-bottom: 0;
        } 

        .notification_content ul li a {
            font-size: 13px;
            color: #721c24;
            background: #f8d7da;
            text-decoration: none;
            padding: 8px 12px;
            display: block;
            border-radius: 4px;
            border: 1px solid #f5c6cb;
            transition: background 0.2s ease;
        }

        .notification_content ul li a:hover {
            background: #f1b0b7;
        }


        .button_header:hover {
            color: #fff !important;
        }

        .budget-flex {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        /* Basic modal styles */
        .modal {
            position: fixed;
            z-index: 9999;
            left: 0; top: 0;
            width: 100%; height: 100%;
            background-color: rgba(0,0,0,0.5);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: white;
            padding: 20px;
            width: 400px;
            border-radius: 5px;
            position: relative;
        }

        .modal-close {
            position: absolute;
            right: 10px; top: 10px;
            font-size: 24px;
            cursor: pointer;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .budget-progreess{
            width: 100%;
        }

       .alert-for-daily-balance {
            display: flex;
            justify-content: center;
            padding: 12px 20px;
            margin: 20px auto;
            max-width: 700px;
            font-weight: 600;
            border-left: 6px solid;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
            font-size: 16px;
        }

        .alert-success {
            background-color: #d1fae5;
            color: #065f46;
            border-color: #10b981;
        }

        .alert-warning {
            background-color: #fef9c3;
            color: #92400e;
            border-color: #facc15;
        }

        .alert-danger {
            background-color: #fee2e2;
            color: #991b1b;
            border-color: #ef4444;
        }

        .alert-info {
            background-color: #e0f2fe;
            color: #0369a1;
            border-color: #3b82f6;
        }

 
        </style>
        @livewireStyles
    </head>
    <body class="bg-gray-50 theme-{{ Auth::check() ? Auth::user()->theme : 'light' }}">
        <div id="app">
            @if (Auth::check())
 
            @php 

                $todaySpending = App\Models\Spending::where('space_id', Auth::user()->id)
                    ->whereDate('happened_on', \Carbon\Carbon::today())
                    ->sum('amount') / 100;

                $diff = $dailyLimit - $todaySpending;

                if ($todaySpending == 0) {
                    $message = "🧘 You haven’t spent anything today. Your daily budget is  <strong> {$dailyLimit} BDT</strong>. Keep it up!";
                    $alertClass = "alert-info";
                } elseif ($todaySpending >= $dailyLimit) {
                    $message = "🔴 You've gone over your daily budget! (Spent: <strong> {$todaySpending} BDT</strong> / Limit: <strong>{$dailyLimit} BDT</strong>)";
                    $alertClass = "alert-danger";
                } elseif ($todaySpending >= ($dailyLimit * 0.9)) {
                    $message = "🟠 You're very close to your daily budget! (Spent: <strong> {$todaySpending} BDT</strong> / Limit: <strong>{$dailyLimit} BDT</strong>)";
                    $alertClass = "alert-warning";
                } else {
                    $message = "🟢 Great! You're spending wisely today. (Spent: <strong> {$todaySpending} BDT</strong> / Limit: <strong>{$dailyLimit} BDT</strong>)";
                    $alertClass = "alert-success";
                }
            @endphp
 
                
             
 
            



                <div class="navigation">
                    <div class="wrapper">
                        <ul class="navigation__menu">
                            <li>
                                <a href="{{ route('dashboard') }}" {!! (Request::path() == 'dashboard') ? 'class="active"' : '' !!}><i class="fas fa-home fa-sm color-blue"></i> <span class="hidden ml-05">{{ __('general.dashboard') }}</span></a>
                            </li>
                            <li>
                                <a href="{{ route('transactions.index') }}" {!! (Request::path() == 'transactions') ? 'class="active"' : '' !!}><i class="fas fa-exchange-alt fa-sm color-green"></i> <span class="hidden ml-05">{{ __('models.transactions') }}</span></a>
                            </li>
                            <li>
                                <a href="{{ route('budgets.index') }}" {!! (Request::path() == 'budgets') ? 'class="active"' : '' !!}><i class="fas fa-wallet fa-sm color-red"></i> <span class="hidden ml-05">{{ __('models.budgets') }}</span></a>
                            </li>
                            <li>
                                <a href="{{ route('tags.index') }}" {!! (Request::path() == 'tags') ? 'class="active"' : '' !!}><i class="fas fa-tag fa-sm color-blue"></i> <span class="hidden ml-05">{{ __('models.tags') }}</span></a>
                            </li>
                            <li>
                                <a href="{{ route('reports.index') }}" {!! (Request::path() == 'reports') ? 'class="active"' : '' !!}><i class="fas fa-chart-line fa-sm color-green"></i> <span class="hidden ml-05">{{ __('pages.reports') }}</span></a>
                            </li>
                        </ul>
                        <ul class="navigation__menu">
                            <li>
                                <button-dropdown>
                                    <a class="button_header" slot="button" href="{{ route('transactions.create') }}">{{ __('actions.create') }} {{ __('models.transaction') }}</a>
                                    <ul slot="menu" v-cloak>
                                        <li>
                                            <a href="{{ route('tags.create') }}">{{ __('actions.create') }} {{ __('models.tag') }}</a>
                                        </li>
                                        {{-- <li>
                                            <a href="{{ route('imports.create') }}">{{ __('actions.create') }} {{ __('models.import') }}</a>
                                        </li> --}}
                                    </ul>
                                </button-dropdown>
                            </li>
                            {{-- <li>
                                <a href="{{ route('activities.index') }}">
                                    <i class="fas fa-clock"></i>
                                </a>
                            </li> --}}

                            <li class="noti_icon">
                                <a href="#" id="noti-toggle">
                                    <i class="fas fa-bell"></i>
                                    <span id="alert-count" style="display: none;"></span>
                            
                                    <div style="display: none;" class="notification_content" id="budget-alert-box" >
                                        <ul id="budget-alert-list"> 
                                        </ul>
                                    </div>
                                </a>
                            </li>
                            
                            @if (Auth::user()->spaces->count() > 1)
                                <li>
                                    <dropdown>
                                        <span slot="button">
                                            {{ $selectedSpace->abbreviated_name }} <i class="fas fa-caret-down fa-sm"></i>
                                        </span>
                                        <ul slot="menu" v-cloak>
                                            @foreach (Auth::user()->spaces as $space)
                                                <li>
                                                    <a href="{{ route('spaces.show', ['space' => $space->id]) }}" v-pre>{{ $space->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </dropdown>
                                </li>
                            @endif
                            <li>
                                <dropdown>
                                    <span slot="button" class="sk_header_user" style="display: flex; gap:5px; align-items:center"> 
                                        <p class="sk_name">{{Auth::user()->name}} </p>
                                        <img src="{{ asset(Auth::user()->avatar) }}" class="avatar mr-05" /> <i class="fas fa-caret-down fa-sm"></i>
                                    </span>
                                    <ul slot="menu" v-cloak>
                                        {{-- <li>
                                            <a href="{{ route('imports.index') }}">{{ __('models.imports') }}</a>
                                        </li> --}}
                                        <li>
                                            <a href="{{ route('settings.index') }}">{{ __('pages.settings') }}</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('logout') }}">{{ __('pages.log_out') }}</a>
                                        </li>
                                    </ul>
                                </dropdown>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="wrapper">
                    <div class="alert-for-daily-balance {{ $alertClass }}">
                        {!! $message !!}
                    </div>

                </div>
                
            @endif
            {{-- @if (Auth::check() && Auth::user()->verification_token)
                <div class="text-center" style="
                    padding: 15px;
                    color: #FFF;
                    background: #F86380;
                ">{!! __('general.verify_account') !!} (or <form method="POST" action="{{ route('resend_verification_mail') }}" style="display: inline-block;">{{ csrf_field() }}<button class="button link">resend</button></form>)</div>
            @endif --}}
            @if (session('verification_mail_status'))
                <div class="wrapper mt-3">
                    @switch(session('verification_mail_status'))
                        @case('success')
                            @include('partials.alerts.success', ['payload' => ['classes' => '', 'message' => 'An e-mail has been sent your way']])
                            @break

                        @case('already_verified')
                            @include('partials.alerts.danger', ['payload' => ['classes' => '', 'message' => 'You\'ve already been verified']])
                            @break

                        @case('rate_limited')
                            @include('partials.alerts.danger', ['payload' => ['classes' => '', 'message' => 'Please wait a few minutes before requesting another e-mail']])
                            @break
                    @endswitch
                </div>
            @endif
            @yield('body')
            @if (auth()->check())
                <div class="text-center mb-3">{{ $versionNumber }}</div>
            @endif
        </div>
        @vite('resources/assets/js/app.js')
        
        @yield('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function () {
                $.ajax({
                    url: "{{ route('budget.alerts') }}",
                    type: "GET",
                    success: function (alerts) {
                        if (alerts.length > 0) {
                            $('#budget-alert-list').empty();

                            alerts.forEach(alert => {
                                $('#budget-alert-list').append(`<li><a href="#" class="${alert.type}">${alert.message}</a></li>`);
                            });

                            // Show alert count
                            $('#alert-count').text(alerts.length).show();
 
                        } else {
                            $('#alert-count').hide();
                            $('#budget-alert-box').hide();
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("Alert fetch error:", error);
                    }
                });

                // Optional toggle when bell icon clicked
                $('#noti-toggle').on('click', function (e) {
                    e.preventDefault();
                    $('#budget-alert-box').toggle();
                });
            });

        </script>
        @livewireScripts
    </body>
</html>
