<div class="col-md-2 col-sm-1 hidden-xs display-table-cell valign-top" id="side-menu">
    <h1 class="hidden-xs hidden-sm">Infinity Services</h1>
    <ul>
        <li class="link {{ Request::is('admin') ? 'active' : '' }}">
            <a href="{{ route('admin') }}">
                <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Dashboard</span>
            </a>
        </li>
        <li class="link {{ Request::is('service') || Request::is('service/create')  ? 'active' : '' }}">
            <a href="{{ route('service.index') }}">
                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Services</span>
                <span class="label label-success pull-right hidden-xs hidden-sm">{{ $serviceCount }}</span>
            </a>
        </li>
        <li class="link {{ Request::is('consumer') || Request::is('consumer/create') ? 'active' : '' }}">
            <a href="{{ route('consumer.index') }}">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Consumers</span>
                <span class="label label-success pull-right hidden-xs hidden-sm">{{ $consumerCount }}</span>
            </a>
        </li>
        <li class="link {{ Request::is('worker') || Request::is('worker/create') ? 'active' : '' }}">
            <a href="{{ route('worker.index') }}">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Workers</span>
                <span class="label label-success pull-right hidden-xs hidden-sm">{{ $workerCount }}</span>
            </a>
        </li>
    </ul>
</div>