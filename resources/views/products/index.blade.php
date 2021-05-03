@php
   // $products = json_decode($products);
@endphp
@extends('layout.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Products</h2><br>
            </div>
            <div class="pull-right">
                @can('product-create')
                <a class="btn btn-success" href="{{ route('create_product') }}"> Create New Product</a><br><br>
                {{-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create" href="{{ route('create_product') }}">
                    Create New Product
                  </button> --}}
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($products as $product)
	    <tr>
	        <td>{{ $product->id }}</td>
	        <td>{{ $product->name }}</td>
	        <td>{{ $product->detail }}</td>
	        <td>
                <form action="#" method="POST">
                    <a class="btn btn-info" href="{{ route('product.show',$product->id) }}">Show</a>
                    @can('product-edit')
                    <a class="btn btn-primary" href="{{ route('product.edit',$product->id) }}">Edit</a>
                    @endcan


                    {{-- @csrf
                    @method('DELETE') --}}
                    @can('product-delete')
                    <a class="btn btn-danger del" href="{{ route('delete',$product->id) }}">x</a>
                    {{-- <button class="btn btn-danger del" type="submit" id="{{$product->id}}">x</button> --}}
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>

    {{-- {!! $products->links() !!} --}}
@endsection

{{-- @section('scripts')

<script>
    $(".del").on('click',function() {
        //var id = $(this).data("id");
        alert('Delete');
        $.ajax({
        url: "{{ route('product.destroy',"+id+") }}",
        type: 'POST',
        data: {
            "id":id
        },
        processData: false,
        contentType: false,
        success: function (data, status){
            toastr.success("Operation termine avec succes ");
            location.reload();
        }
        });
    });

</script>

@endsection --}}