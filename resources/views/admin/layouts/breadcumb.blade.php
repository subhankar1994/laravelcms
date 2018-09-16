<ol class="breadcrumb">
    <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <?php $segments = ''; ?>
    @foreach(Request::segments() as $key => $segment)
        <?php $segments .= '/'.$segment; ?>
        @if($key != 0)
        <li @if($key == count(Request::segments())-1) class="active" @endif>
            <a href="{{ $segments }}">{{ ucfirst($segment)}}</a>
        </li>
        @endif
    @endforeach
</ol>