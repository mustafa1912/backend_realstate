@extends(AdminCore())
@section('content')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{url('/admin')}}">{{trans('orbscope.home')}}</a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <span>{{trans('orbscope.dashboard')}}</span>
            </li>
        </ul>
    </div>

    <div class="dao-page-header">
        <div>
            <div class="dao-eyebrow">{{ trans('orbscope.brand_eyebrow') }}</div>
            <h1 class="dao-page-title">{{ trans('orbscope.brand_name') }}</h1>
            <p class="dao-page-subtitle">{{ trans('orbscope.dashboard_subtitle') }}</p>
        </div>
    </div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- Portfolio & Financial KPI Grid (4 desktop / 2 tablet / 1 mobile) -->
    <div class="dao-section-label">
        <span>{{ trans('orbscope.portfolio_overview') }}</span>
    </div>

    <div class="dao-kpi-grid dao-kpi-grid-7">
        <!-- 1. Units Count -->
        <a href="{{url('/admin/units')}}" class="dao-kpi-card">
            <div class="dao-kpi-top">
                <span class="dao-kpi-icon"><i class="fa fa-building-o"></i></span>
                <i class="fa fa-arrow-right dao-kpi-arrow"></i>
            </div>
            <div>
                <div class="dao-kpi-label">{{trans('orbscope.unit_numbers')}}</div>
                <div class="dao-kpi-value">
                    <span data-counter="counterup" data-value="{{$units_count}}">{{$units_count}}</span>
                </div>
            </div>
        </a>

        <!-- 2. Rented Units -->
        <a href="{{url('/admin/contracts')}}" class="dao-kpi-card">
            <div class="dao-kpi-top">
                <span class="dao-kpi-icon"><i class="fa fa-key"></i></span>
                <i class="fa fa-arrow-right dao-kpi-arrow"></i>
            </div>
            <div>
                <div class="dao-kpi-label">{{trans('orbscope.number_rental_units')}}</div>
                <div class="dao-kpi-value">
                    <span data-counter="counterup" data-value="{{$flats_rent}}">{{$flats_rent}}</span>
                </div>
            </div>
        </a>

        <!-- 3. Available Units -->
        <a href="{{url('/admin/follow_up')}}" class="dao-kpi-card">
            <div class="dao-kpi-top">
                <span class="dao-kpi-icon"><i class="fa fa-check-circle-o"></i></span>
                <i class="fa fa-arrow-right dao-kpi-arrow"></i>
            </div>
            <div>
                <div class="dao-kpi-label">{{trans('orbscope.number_of_units_available')}}</div>
                <div class="dao-kpi-value">
                    <span data-counter="counterup" data-value="{{$flats_notrent}}">{{$flats_notrent}}</span>
                </div>
            </div>
        </a>

        <!-- 4. Tenants Count -->
        <a href="{{url('/admin/customer')}}" class="dao-kpi-card">
            <div class="dao-kpi-top">
                <span class="dao-kpi-icon"><i class="fa fa-users"></i></span>
                <i class="fa fa-arrow-right dao-kpi-arrow"></i>
            </div>
            <div>
                <div class="dao-kpi-label">{{trans('orbscope.number_tenants')}}</div>
                <div class="dao-kpi-value">
                    <span data-counter="counterup" data-value="{{$users_count}}">{{$users_count}}</span>
                </div>
            </div>
        </a>

        <!-- 5. Owners Count -->
        <a href="{{url('/admin/customer')}}" class="dao-kpi-card">
            <div class="dao-kpi-top">
                <span class="dao-kpi-icon"><i class="fa fa-user-circle-o"></i></span>
                <i class="fa fa-arrow-right dao-kpi-arrow"></i>
            </div>
            <div>
                <div class="dao-kpi-label">{{trans('orbscope.owners_number')}}</div>
                <div class="dao-kpi-value">
                    <span data-counter="counterup" data-value="{{$owner_count}}">{{$owner_count}}</span>
                </div>
            </div>
        </a>

        <!-- 6. Total Expenses (Featured Dark Navy Card) -->
        <a href="{{url('/admin/invoice')}}" class="dao-kpi-card is-featured">
            <div class="dao-kpi-top">
                <span class="dao-kpi-icon"><i class="fa fa-credit-card"></i></span>
                <span class="dao-kpi-badge">{{ trans('orbscope.financial_overview') }}</span>
            </div>
            <div>
                <div class="dao-kpi-label">{{trans('orbscope.total_expenses')}}</div>
                <div class="dao-kpi-value">
                    <span data-counter="counterup" data-value="{{$outcome_amount}}">{{$outcome_amount}}</span>
                    <span class="dao-kpi-unit">{{trans('orbscope.aed')}}</span>
                </div>
            </div>
        </a>

        <!-- 7. Gross Income (Featured Dark Navy Wide Spotlight Card) -->
        <a href="{{url('/admin/financial_report')}}" class="dao-kpi-card is-featured is-featured-wide">
            <div class="dao-kpi-top">
                <span class="dao-kpi-icon"><i class="fa fa-line-chart"></i></span>
                <span class="dao-kpi-badge"><i class="fa fa-star"></i> {{ trans('orbscope.financial_overview') }}</span>
            </div>
            <div>
                <div class="dao-kpi-label">{{trans('orbscope.gross_income')}}</div>
                <div class="dao-kpi-value">
                    <span data-counter="counterup" data-value="{{$income_amount}}">{{$income_amount}}</span>
                    <span class="dao-kpi-unit">{{trans('orbscope.aed')}}</span>
                </div>
            </div>
        </a>
    </div>

    <!-- Expiring Contracts This Month -->
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject bold font-dark">{{trans('orbscope.contracts_expire_month')}}</span>
                    </div>
                    <div class="actions">
                        <a href="{{url('admin/contracts')}}" class="btn dao-btn-outline">
                            {{trans('orbscope.show-all')}} {{trans('orbscope.contracts')}}
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    @if(isset($contract_end) && count($contract_end) > 0)
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>{{trans('orbscope.contract_number')}}</th>
                                        <th>{{trans('orbscope.end_date')}}</th>
                                        <th>{{trans('orbscope.status')}}</th>
                                        <th>{{trans('orbscope.actions')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($contract_end as $co)
                                        <tr>
                                            <td><strong>{{trans('orbscope.contract_number')}} #{{$co->contract_number}}</strong></td>
                                            <td><bdi dir="ltr">{{$co->end_date}}</bdi></td>
                                            <td>
                                                <span class="dao-badge dao-badge-warning">
                                                    <i class="fa fa-clock-o"></i> {{trans('orbscope.expiring_soon')}}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{url('admin/contracts/'.$co->id)}}" class="btn btn-sm dao-btn-outline">
                                                    <i class="fa fa-eye"></i> {{trans('orbscope.view_contract')}}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="dao-empty-state">
                            <div class="dao-empty-icon">
                                <i class="fa fa-calendar-check-o"></i>
                            </div>
                            <h4 class="dao-empty-title">{{ trans('orbscope.no_expiring_contracts') }}</h4>
                            <p class="dao-empty-desc">{{ trans('orbscope.no_expiring_contracts_desc') }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Analytics Charts -->
    <div class="dao-charts-grid">
        <div class="dao-chart-card">
            <div class="dao-chart-card-head">
                <h4>{{trans('orbscope.maintenance_summary')}}</h4>
            </div>
            <div id="piechart" style="width: 100%; height: 340px;"></div>
        </div>
        <div class="dao-chart-card">
            <div class="dao-chart-card-head">
                <h4>{{trans('orbscope.unit_collections_months')}}</h4>
            </div>
            <div id="columnchart_values" style="width: 100%; height: 340px;"></div>
        </div>
    </div>

    <script type="text/javascript">
        var daoChartsReady = false;
        if (typeof google !== 'undefined' && google.charts) {
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(function () {
                daoChartsReady = true;
                drawMaintenancePieChart();
                drawCollectionsColumnChart();
            });
        }

        function drawMaintenancePieChart() {
            if (!daoChartsReady || !google.visualization || !google.visualization.arrayToDataTable) return;
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Count'],
                @if(isset($orders['new']))
                ['{{trans('orbscope.new')}}', {{@$orders['new']->count()}}],
                @endif
                @if(isset($orders['progress']))
                ['{{trans('orbscope.progress')}}', {{@$orders['progress']->count()}}],
                @endif
                @if(isset($orders['done']))
                ['{{trans('orbscope.done')}}', {{@$orders['done']->count()}}],
                @endif
                @if(isset($orders['canceled']))
                ['{{trans('orbscope.canceled')}}', {{@$orders['canceled']->count()}}],
                @endif
            ]);

            var options = {
                pieHole: 0.45,
                colors: ['#07101b', '#b38734', '#059669', '#dc2626'],
                backgroundColor: 'transparent',
                chartArea: { width: '88%', height: '82%' },
                legend: { position: 'bottom', textStyle: { color: '#364153', fontSize: 12 } }
            };

            var el = document.getElementById('piechart');
            if (el) {
                var chart = new google.visualization.PieChart(el);
                chart.draw(data, options);
            }
        }

        function drawCollectionsColumnChart() {
            if (!daoChartsReady || !google.visualization || !google.visualization.arrayToDataTable) return;
            var data = google.visualization.arrayToDataTable([
                ["{{trans('orbscope.month')}}", "{{trans('orbscope.amount_money')}}"],
                @if($m != null && count(json_decode($m)) > 0)
                    @foreach(json_decode($m) as $n)
                        ['{{$n->months}}', {{$n->sums}}],
                    @endforeach
                @else
                    ['-', 0]
                @endif
            ]);

            var view = new google.visualization.DataView(data);
            var isNarrow = window.innerWidth < 500;
            var options = {
                title: "",
                height: 330,
                backgroundColor: 'transparent',
                colors: ['#b38734'],
                bar: { groupWidth: isNarrow ? "48%" : "55%" },
                legend: { position: "none" },
                chartArea: { left: isNarrow ? 64 : 74, right: 16, top: 20, bottom: 44 },
                vAxis: { gridlines: { color: '#e5e7eb' }, textStyle: { color: '#6a7282', fontSize: 11 } },
                hAxis: { textStyle: { color: '#364153', fontSize: 11 } }
            };
            var el = document.getElementById("columnchart_values");
            if (el) {
                var chart = new google.visualization.ColumnChart(el);
                chart.draw(view, options);
            }
        }

        $(window).on('resize', function () {
            if (daoChartsReady) {
                drawMaintenancePieChart();
                drawCollectionsColumnChart();
            }
        });
    </script>
@endsection
