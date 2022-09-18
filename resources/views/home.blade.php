@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <!-- Content Row -->
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-12 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Projects</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $projects }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-12 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Tasks</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tasks }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-12 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Users
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $users }}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-6">
            <div class="col-xl-12 col-md-6 mb-4">
                <a href="{{ route('tasks') }}" class="btn btn-primary"> Add New Task</a>
            </div>
            <div class="col-xl-12 col-md-6 mb-4">
                <ul id="sortable">
                    @if (count($items) > 0)
                        @foreach ($items as $row)
                            <div class="card">
                                <li class="ui-state-default" id="<?php echo $row->id; ?>"><span
                                        class="ui-icon ui-icon-arrowthick-2-n-s"></span>
                                    <h4><strong><?php echo strtoupper($row->name); ?></strong></h4>
                                </li>
                            </div>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('extra-js')
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>
        $(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#sortable").sortable({
                update: function(event, ui) {
                    updateOrder();
                }
            });
        });

        function updateOrder() {
            var item_order = new Array();
            $('#sortable li').each(function() {
                item_order.push($(this).attr("id"));
            });
            var order_string = 'order=' + item_order;
            $.ajax({
                type: "POST",
                url: "{{ route('update-order') }}",
                data: order_string,
                cache: false,
                success: function(data) {}
            });
        }
    </script>
@endsection
