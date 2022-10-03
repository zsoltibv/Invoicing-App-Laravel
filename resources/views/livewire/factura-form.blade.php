<div>
    <form action="{{route('factura.generate', ['id' => $user->id])}}" method="POST" enctype="multipart/form-data" class="mt-6">
        @csrf
        <div class="control-wraper flex flex-col text-sm">
            <div class="controls">
                <label for="client" class="col-md-4 col-form-label">{{ __('Nume client*') }}</label>
                <div class="options py-3 flex">
                    <select name="client" id="client"
                        class="rounded-l-md border-r-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach($user->dateClient as $key=>$client)
                            <option value="{{$client->id}}">{{$client->denumire}}</option>
                        @endforeach
                    </select>
                    <a href="{{route('account.date-clienti')}}"
                        class="inline-flex items-center justify-center w-48 text-sm text-blue-700 font-medium rounded-r-md border border-gray-300 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                        <svg class="fill-blue-700 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                            width="24" height="24">
                            <path d="M17 15V8h-2v7H8v2h7v7h2v-7h7v-2z" />
                            <path fill="none" d="M0 0h32v32H0z" />
                        </svg>
                        <span class="">Client&nbsp;Nou</span>
                    </a>
                </div>
            </div>
            <div class="controls">
                <label for="produs" class="col-md-4 col-form-label">{{ __('Produs*') }}</label>
                {{-- Table --}}

                <div class="overflow-x-auto relative mt-6 rounded-t-md">
                    <table class="w-full text-sm text-left">
                        <thead class="text-xs text-gray-500 uppercase bg-gray-100 border rounded-md">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    Nume Produs
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Cantitate
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderProducts as $index => $orderProduct)
                            <tr>
                                <td class="px-3">
                                    <select name="orderProducts[{{$index}}][product_id]"
                                        wire:model="orderProducts.{{$index}}.product_id"
                                        class="mt-2 rounded-md bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full">
                                        <option value="">-- choose product --</option>
                                        @foreach ($allProducts as $product)
                                        <option value="{{ $product->id }}">
                                            {{ $product->nume }} ({{ number_format($product->pret, 2)}} {{$product->moneda}})
                                        </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="px-3">
                                    <input type="number" name="orderProducts[{{$index}}][quantity]"
                                        class="mt-2 rounded-md bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-32"
                                        wire:model="orderProducts.{{$index}}.quantity" />
                                </td>
                                <td>
                                    <a href="#" wire:click.prevent="removeProduct({{$index}})">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- Table end --}}
                <button wire:click.prevent="addProduct"
                    class="mt-2 inline-flex items-center justify-center h-10 w-48 text-sm text-blue-700 font-medium rounded-md border border-gray-300 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                    <svg class="fill-blue-700 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="24"
                        height="24">
                        <path d="M17 15V8h-2v7H8v2h7v7h2v-7h7v-2z" />
                        <path fill="none" d="M0 0h32v32H0z" />
                    </svg>
                    <span class="">Produs&nbsp;Nou</span>
                </button>
            </div>
        </div>
        <button type="submit" class="btn btn-primary text-white">
            <div class="pt-6">
                <div class="rounded-md h-10 px-12 text-sm bg-blue-700 flex items-center justify-center">
                    {{ __('Emite') }}
                </div>
            </div>
        </button>
    </form>
</div>