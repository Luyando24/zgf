@props(['headers', 'data', 'caption' => null])

<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        @if($caption)
            <caption class="sr-only">{{ $caption }}</caption>
        @endif
        
        <thead class="bg-gray-50">
            <tr>
                @foreach($headers as $header)
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ $header }}
                    </th>
                @endforeach
            </tr>
        </thead>
        
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($data as $row)
                <tr>
                    @foreach($row as $key => $cell)
                        @if($loop->first)
                            <th scope="row" class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $cell }}
                            </th>
                        @else
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $cell }}
                            </td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>