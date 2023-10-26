@include("shared/header")
<div class="container foy-container mt-5">
    <div class="foy-inner-container">
        <table class="table mt-4">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Date</th>
                <th scope="col" style="width: 10%">Action</th>
            </tr>
            </thead>
            <tbody>
            @if(count($orders) > 0)
                @php
                    $i = 1;
                @endphp
                @foreach($orders as $order)

                    <tr>
                        <th scope="row">{{ $i }}</th>
                        <td> {{ $order->name  }}</td>
                        <td> {{ $order->created_at }}</td>
                        <td class="d-flex">
                            <form method="post" action="{{  url('/order/delete/'.$order->id) }}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger mr-1">Delete</button>
                            </form>
                            <form method="post" action="{{  url('/order/confirm/'.$order->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-success">Confirm</button>
                            </form>
                        </td>
                    </tr>
                    @php
                        $i++;
                    @endphp
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>
@include("shared/footer")
