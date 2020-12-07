@extends('back-end.layouts.app')

@section('title')
    {{$page_title}}
@endsection


@section('content')
    @component('back-end.layouts.navbar',['nav_title'=>$page_title])
    @endcomponent
    @component('back-end.shared.table',['page_title'=>$page_title,'page_description'=>$page_description])
        @slot('addButton')
            <div class="col-md-4 text-right">
                <a href="{{route($routeName.'.create')}}" class="btn btn-white btn-round">Add {{$sModuleName}}</a>
            </div>
        @endslot
        <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                <th>ID</th>
                <th>Name</th>
                <th>Control</th>
                </thead>
                <tbody>
                @foreach($rows as $row)
                    <tr>
                        <td>{{$row->id}}</td>
                        <td>{{$row->name}}</td>
                        <td >
                            @include('back-end.shared.buttons.edit')
                            @include('back-end.shared.buttons.delete')
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $rows->links() !!}
        </div>
    @endcomponent

@endsection

