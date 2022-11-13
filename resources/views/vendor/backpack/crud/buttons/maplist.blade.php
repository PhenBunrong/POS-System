@if ($crud->hasAccess('show'))
	<a href="{{URL('admin/product/getProduct')}}"   class="btn btn-primary">List Card</a>
@endif
