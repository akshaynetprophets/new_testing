<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
       <table>
        <thead>
            <tr>
                <th>{{__('ID')}}</th>
                <th>{{__('TITLE')}}</th>
                <th>{{__('CONTENT')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $key => $value)
            <tr>
                <td>{{$value->id}}</td>
                <td>{{$value->title ?? ''}}</td>
                <td>{{$value->content ?? ''}}</td>
            </tr>
            @endforeach
        </tbody>
       </table>
    </div>
</x-app-layout>