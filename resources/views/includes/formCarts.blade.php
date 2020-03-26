@php $today = date("Y-m-d"); @endphp
<p>
    <a class="btn btn-outline-info" data-toggle="collapse" href="#collapseOneDay" role="button" aria-expanded="false" aria-controls="collapseOneDay">por Día</a>&nbsp;
    <a href="{{ url('/today/'.$today) }}" class="btn btn-outline-warning">Hoy</a>
</p>
<div class="collapse" id="collapseOneDay">
    <div class="card card-body">
        <form method="post" action="{{ url('/someday') }}">
            {{ csrf_field() }}
            <div class="row">
                <div class="class col-sm-3">
                    <input class="form-control" onload="getDate()" type="date" name="date" id="date">
                </div>
                <div class="class col-sm-1">
                    <button class="btn btn-primary">Consultar</button>
                </div>
            </div>
        </form>
    </div>
</div>
