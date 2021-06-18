@extends('layout.default')

@if($mode == 'edit')
@section('title', $__t('Edit %s', $userentity->caption))
@else
@section('title', $__t('Create %s', $userentity->caption))
@endif

@section('viewJsName', 'userobjectform')

@section('content')
<div class="row">
	<div class="col">
		<h2 class="title">@yield('title')</h2>
	</div>
</div>

<hr class="my-2">

<div class="row">
	<div class="col-lg-6 col-xs-12">
		<script>
			GrocyConfig.EditMode = '{{ $mode }}';
			GrocyConfig.EditObjectParentId = {{ $userentity->id }};
			GrocyConfig.EditObjectParentName = "{{ $userentity->name }}";
		</script>

		@if($mode == 'edit')
		<script>
			GrocyConfig.EditObjectId = {{ $userobject->id }};
		</script>
		@endif

		<form id="userobject-form"
			novalidate>

			@include('components.userfieldsform', array(
			'userfields' => $userfields,
			'entity' => 'userentity-' . $userentity->name
			))

			<button id="save-userobject-button"
				class="btn btn-success">{{ $__t('Save') }}</button>

		</form>
	</div>
</div>
@stop
