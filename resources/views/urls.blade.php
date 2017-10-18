@extends('layouts.app')

@section('content')

    <div class="container">
        <h3>Shortened URLs</h3>
        @if(Session::has('success'))
            <div class="alert alert-success">{!! Session::get('success') !!}</div>
        @endif
        <div class="table-responsive">
            <table class="table table-striped table-condensed cf sortable">
                <thead>
                    <tr>
                        <th>Real URL</th>
                        <th>Shortened URL</th>
                        <th>Views</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($urls as $key => $url)
                        <tr>
                            <td>
                                <a target="blank" href="{{$url->real_url}}">{{$url->real_url}}</a>
                            </td>
                            <td>
                                <a target="blank" href="{{url('short/'.$url->new_url)}}">{{url('short/'.$url->new_url)}}</a>
                            </td>
                            <td align="right">
                                {{$url->clicked}}
                            </td>
                            <td align="center">
                                <a href="#" data-id="{{$url->id}}" class="delete-shortened-url">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script type="">
        $(document).ready(function(){
            $(".delete-shortened-url").click(function(){
                if(confirm('Are you sure to delete this shortened URL?')){
                    document.location.href = "{{url('deleteshortened/')}}" + "/" + $(this).data('id');
                }
            })
        })
    </script>
   
@endsection
