@if ($crud->hasAccess('delete'))
	<a type="button" href="{{URL('admin/customer/export')}}" class="btn btn-secondary">Export Excel</a>
@endif


{{-- {{ trans('backpack::crud.delete') }} --}}