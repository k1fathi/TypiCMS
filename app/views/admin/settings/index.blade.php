@section('h1')
	{{ ucfirst(trans('global.settings')) }}
@stop

@section('main')

<div class="row">

	<div class="col-sm-6">

	{{ Form::model($data, array('method' => 'post', 'role' => 'form')) }}

		@include('admin.settings._form')

	{{ Form::close() }}

	</div>

	<div class="col-sm-6">

		<div>
			<a href="{{ route('backup') }}" class="btn btn-default"><i class="fa fa-download"></i> {{ trans('settings.Backup DB') }}</a>
		</div>

		<table class="table table-condensed">
			<thead>
				<tr><th colspan="2">@lang('settings.System info')</th></tr>
			</thead>
			<tbody>
				<tr>
					<td class="col-sm-6">@lang('settings.Environment')</td>
					<td class="col-sm-6"><b>{{ App::environment(); }}</b></td></tr>
				<tr>
					<td>@lang('settings.System locales')</td>
					<td><div class="max-height"><b><?php system('locale -a'); ?></b></div></td>
				</tr>
				<tr>
					<td>@lang('settings.App locales')</td>
					<td><b>{{ implode(', ', Config::get('app.locales')); }}</b></td>
				</tr>
				<tr>
					<td>@lang('settings.Active locale')</td>
					<td><b>{{ Config::get('app.locale'); }}</b></td>
				</tr>
				<tr>
					<td>@lang('settings.Cache public')</td>
					<td><b><?php echo Config::get('app.cache') ? trans('settings.Yes') : trans('settings.No') ; ?></b></td>
				</tr>
			</tbody>
		</table>

	</div>

</div>

@stop