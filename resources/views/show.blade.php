<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @if($transactions)
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <table style="border-bottom-style: double; border-color: #1a202c">
                            <tr style="border: 1px solid #dddddd; text-align: left; padding: 8px;">
                                <th >transaction account</th>
                                <th>transaction type</th>
                                <th>transaction amount</th>
                                <th>transaction date</th>
                            </tr>

                            <tbody>
                            @foreach($transactions as $transaction)
                                <tr>
                                    <td>  {{$transaction->account_id}}  </td>
                                    <td>  {{$transaction->type}}  </td>
                                    <td>  {{$transaction->amount}}  </td>
                                    <td>  {{$transaction->created_at}}  </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    @endif
</x-app-layout>
