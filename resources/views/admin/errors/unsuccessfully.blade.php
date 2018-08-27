@if(session('status'))
    <div class="alert alert-danger" style="margin-top: 10px">
        <ul>
            <li>{{session('status')}}</li>
        </ul>
    </div>
@endif