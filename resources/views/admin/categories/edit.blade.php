@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

  @component('admin.components.breadcrumb')
    @slot('title')  Редактирование города @endslot
    @slot('parent') Главная @endslot
    @slot('active') Города @endslot
  @endcomponent

 <hr />

 <form class="form-horizontal" action="{{route('admin.category.update', $category)}}" method="post">
   <input type="hidden" name="_method" value="put">
   {{csrf_field()}}

   @include('admin.categories.partials.form')
 </form>
</div>

@endsection
