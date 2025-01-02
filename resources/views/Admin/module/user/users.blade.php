<div>
    @if (session('message'))
    <div class="px-4 py-3 rounded relative 
            @if(session('type') == 'error') bg-red-100 border border-red-400 text-red-700 
            @elseif(session('type') == 'success') bg-green-100 border border-green-400 text-green-700 
            @elseif(session('type') == 'warning') bg-yellow-100 border border-yellow-400 text-yellow-700 
            @endif"
        role="alert">
        <strong class="font-bold">
            {{ ucfirst(session('type')) }}!
        </strong>
        <span class="block sm:inline">{{ session('message') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.remove();">
            <svg class="fill-current h-6 w-6 text-black-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M14.348 14.849a1 1 0 01-1.414 0L10 11.414 7.066 14.35a1 1 0 01-1.415-1.414l2.934-2.936-2.934-2.934a1 1 0 011.415-1.414L10 8.586l2.936-2.934a1 1 0 011.414 1.414L11.414 10l2.934 2.936a1 1 0 010 1.414z" />
            </svg>
        </span>
    </div>
    @endif
</div>
<div id="all" class="tab-content">
    <div class="bg-white rounded-lg shadow p-4 overflow-auto">
        <table class="w-full border-collapse border border-gray-300">
            <thead class="bg-gray-200">
                <tr>
                    <th class="text-left px-4 py-2 border border-gray-300">Sl No.</th>
                    <th class="text-left px-4 py-2 border border-gray-300">User Name</th>
                    <th class="text-left px-4 py-2 border border-gray-300">Email Id</th>
                    <th class="text-left px-4 py-2 border border-gray-300">Mobile</th>
                    <th class="text-left px-4 py-2 border border-gray-300">Role</th>
                    <th class="text-left px-4 py-2 border border-gray-300">Website Login Request</th>
                </tr>
            </thead>
            <tbody>
                @if($users && count($users) > 0)
                @php $sl = 1; @endphp
                @foreach($users as $user)
                <tr>
                    <td class="px-4 py-2 border border-gray-300">{{$sl++}}</td>
                    <td class="px-4 py-2 border border-gray-300">{{$user['name']}}</td>
                    <td class="px-4 py-2 border border-gray-300">{{$user['email']}}</td>
                    <td class="px-4 py-2 border border-gray-300">{{$user['mobile']}}</td>
                    <td class="px-4 py-2 border border-gray-300">
                        <form action="{{ url('Administrator/updateUserRole', $user['id']) }}" method="POST" class="flex items-center">
                            @csrf
                            <select name="role" class="border border-gray-300 rounded px-2 py-1 mr-2">
                                <option value="USER" {{ $user['role'] === 'USER' ? 'selected' : '' }}>USER</option>
                                <option value="EDITOR" {{ $user['role'] === 'EDITOR' ? 'selected' : '' }}>EDITOR</option>
                            </select>
                            <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                Update
                            </button>
                        </form>
                    </td>
                    <td class="px-4 py-2 border border-gray-300 flex space-x-2">
                        @if($user['is_approved'] != '0')
                        <span class="inline-block {{$user['is_approved'] == '1' ? 'bg-green-500' : 'bg-red-500'}} text-white text-xs font-semibold rounded-full px-3 py-1">
                            {{$user['is_approved'] =='1' ? 'Approved' : 'Rejected'}}
                        </span>
                        @else
                        <a href="#" onclick="event.preventDefault(); changeUserstatus('1', {{$user['id']}});"
                            class="inline-block bg-green-500 text-white text-xs font-semibold rounded-full px-3 py-1 flex items-center space-x-1 hover:bg-green-600 transition">
                            <i class="fa fa-check" aria-hidden="true"></i><span>Approve</span>
                        </a>
                        <a href="#" onclick="event.preventDefault(); changeUserstatus('2', {{$user['id']}});"
                            class="inline-block bg-red-500 text-white text-xs font-semibold rounded-full px-3 py-1 flex items-center space-x-1 hover:bg-red-600 transition">
                            <i class="fa fa-close" aria-hidden="true"></i><span>Reject</span>
                        </a>
                        @endif
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="6" class="px-4 py-2 text-center text-gray-500">No data found</td>
                </tr>
                @endif
            </tbody>
        </table>
        <div class="pagination">
            {{ $users->links() }}
        </div>
    </div>
</div>
<script>
    function changeUserstatus(status, userId) {
        const confirmMessage = `Are you sure to proceed?`;

        Swal.fire({
            title: 'Confirm Action',
            text: confirmMessage,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, proceed!',
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: '{{ url("Administrator/update_user_status") }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        userId: userId,
                        status: status,
                    },
                    success: function(response) {
                        Swal.fire(
                            'Success!',
                            `User is updated.`,
                            'success'
                        ).then(() => {
                            location.reload();
                        });
                    },
                    error: function(xhr, status, error) {
                        Swal.fire(
                            'Error!',
                            'Failed to update the comment status. Please try again.',
                            'error'
                        );
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    }
</script>