@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1><i class="fa fa-code"></i> Demo de Nueva Funcionalidad</h1>

            <p class="my-0">Teniendo el array:</p>

            <pre>
[
    [​&quot;​2018-12-01​&quot;​,​&quot;​AM​&quot;​,​&quot;​ID123​&quot;,​ ​5000​],
    [​&quot;​2018-12-01​&quot;​,​&quot;​AM​&quot;​,​&quot;​ID545​&quot;,​ ​7000​],
    [​&quot;​2018-12-01​&quot;​,​&quot;​PM​&quot;​,​&quot;​ID545​&quot;,​ ​3000​],
    [​&quot;​2018-12-02​&quot;​,​&quot;​AM​&quot;​,​&quot;​ID545​&quot;,​ ​7000​]
]
            </pre>

            <button class="btn btn-primary" onclick="transform()">Transformar</button>
        </div>
    </div>
</div>
@endsection
@push('js')
    <script>
        function transform() {
            const array = [
                ['2018-12-01', 'AM', 'ID123', 5000],
                ['2018-12-01', 'AM', 'ID545', 7000],
                ['2018-12-01', 'PM', 'ID545', 3000],
                ['2018-12-02', 'AM', 'ID545', 7000],
            ];

            let newArray = [];
            array.forEach(item => {
                newArray[item[0]] = 'la'
            })
        }
    </script>
@endpush
