@extends('layouts.app')
@section('content')
<div class="container" id="demo">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1><i class="fa fa-code"></i> Demo de Nueva Funcionalidad</h1>

            <p class="my-1">Transformar el siguiente array:</p>

            <pre>
[
    [​&quot;​2018-12-01​&quot;​,​&quot;​AM​&quot;​,​&quot;​ID123​&quot;,​ ​5000​],
    [​&quot;​2018-12-01​&quot;​,​&quot;​AM​&quot;​,​&quot;​ID545​&quot;,​ ​7000​],
    [​&quot;​2018-12-01​&quot;​,​&quot;​PM​&quot;​,​&quot;​ID545​&quot;,​ ​3000​],
    [​&quot;​2018-12-02​&quot;​,​&quot;​AM​&quot;​,​&quot;​ID545​&quot;,​ ​7000​]
]
            </pre>

            <button class="btn btn-primary" @click="transform">
                <i class="fa fa-arrow-down"></i> Transformar <i class="fa fa-arrow-down"></i>
            </button>

            <h2 class="mt-3">Resultado <small class="text-muted">(Puede ver el objeto en la consola)</small></h2>

            <table class="table">
                <thead>
                    <th>Fecha</th>
                    <th>AM</th>
                    <th>PM</th>
                </thead>
                <tbody>
                    <tr v-for="(line, date) in resultObject">
                        <td>@{{date || '-'}}</td>
                        <td>@{{line.AM || '-'}}</td>
                        <td>@{{line.PM || '-'}}</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
@push('js')
    <script>
        new Vue({
            el: '#demo',
            data() {
                return {
                    resultObject: ['bla']
                }
            },
            methods: {
                transform() {
                    const array = [
                        ['2018-12-01', 'AM', 'ID123', 5000],
                        ['2018-12-01', 'AM', 'ID545', 7000],
                        ['2018-12-01', 'PM', 'ID545', 3000],
                        ['2018-12-02', 'AM', 'ID545', 7000],
                    ];

                    let date, ampm, value;
                    let newObject = {};
                    array.forEach(item => {
                        date = item[0];
                        ampm = item[1];
                        value = parseInt(item[3]);

                        if(!newObject.hasOwnProperty(date)) newObject[date] = {};

                        if(!newObject[date].hasOwnProperty(ampm)) newObject[date][ampm] = 0;

                        newObject[date][ampm] += value;
                    });

                    console.log(newObject)
                    this.resultObject = newObject
                }
            }
        })
    </script>
@endpush
