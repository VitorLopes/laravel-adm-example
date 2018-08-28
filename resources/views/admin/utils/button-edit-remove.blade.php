<a href="{{route($routebaseedit, [$item->id])}}">
    <span class="btn btn-primary glyphicon glyphicon-pencil" aria-hidden="true"></span>
</a>
<a href="javascript:;" onclick="if (confirm('Deseja excluir?')) { window.location.href='{{route($routebaseremove, [$item->id])}}'}">
    <span class="btn btn-danger glyphicon glyphicon-remove" aria-hidden="true"></span>
</a>