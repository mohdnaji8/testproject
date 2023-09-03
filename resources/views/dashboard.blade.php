<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    @if($accounts)
        @foreach($accounts as $account)
            <div class="py-4">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <a href="{{route('show.acount', $account->id)}}">
                            <div class="p-6 text-gray-900">
                                Account Number: {{$account->number}} <br>
                                Account Currnecy: {{$account->currnecy}} <br>
                                Account Balance: {{$account->balance}} <br>
                            </div>
                        </a>

                    </div>
                </div>
            </div>
        @endforeach
    @endif


</x-app-layout>
