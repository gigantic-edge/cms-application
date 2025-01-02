<style>
    .tab-link {
        display: inline-block;
        padding: 12px 16px;
        text-decoration: none;
        border-bottom: 2px solid transparent;
        font-weight: 500;
        color: #6b7280;
    }

    .tab-link:hover {
        color: #1d4ed8;
        border-color: #cbd5e1;
    }

    .active-tab {
        color: #1d4ed8;
        border-bottom: 2px solid #1d4ed8;
    }

    .hide {
        display: none;
    }
</style>
<div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
    <ul class="flex flex-wrap -mb-px">
        <li class="me-2">
            <a href="#" id="tab-all" onclick="showTab('all')" class="tab-link active-tab">All</a>
        </li>
        <li class="me-2">
            <a href="#" id="tab-pending" onclick="showTab('pending')" class="tab-link">Pending</a>
        </li>
        <li class="me-2">
            <a href="#" id="tab-approved" onclick="showTab('approved')" class="tab-link">Approved</a>
        </li>
        <li class="me-2">
            <a href="#" id="tab-rejected" onclick="showTab('rejected')" class="tab-link">Rejected</a>
        </li>
    </ul>
</div>

<div id="tab-content" class="p-4">
    <div id="all" class="tab-content">
        <div class="bg-white rounded-lg shadow p-4 overflow-auto">
            <table class="w-full border-collapse border border-gray-300">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="text-left px-4 py-2 border border-gray-300">Sl No.</th>
                        <th class="text-left px-4 py-2 border border-gray-300">Article</th>
                        <th class="text-left px-4 py-2 border border-gray-300">Comment</th>
                        <th class="text-left px-4 py-2 border border-gray-300">Commentator</th>
                        <th class="text-left px-4 py-2 border border-gray-300">Status</th>
                        <th class="text-left px-4 py-2 border border-gray-300">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($all_comments && count($all_comments) > 0)
                    @php $sl = 1; @endphp
                    @foreach($all_comments as $comment)
                    <tr>
                        <td class="px-4 py-2 border border-gray-300">{{$sl++}}</td>
                        <td class="px-4 py-2 border border-gray-300">{{$comment['article_name']}}</td>
                        <td class="px-4 py-2 border border-gray-300">{{$comment['comment']}}</td>
                        <td class="px-4 py-2 border border-gray-300">{{$comment['user_name']}}</td>
                        <td class="px-4 py-2 border border-gray-300 flex space-x-2">
                            @if($comment['status'] == 'pending')
                            <a href="#" onclick="event.preventDefault(); changestatus('approve', {{$comment['id']}});"
                                class="inline-block bg-green-500 text-white text-xs font-semibold rounded-full px-3 py-1 flex items-center space-x-1 hover:bg-green-600 transition">
                                <i class="fa fa-check" aria-hidden="true"></i><span>Approve</span>
                            </a>
                            <a href="#" onclick="event.preventDefault(); changestatus('reject', {{$comment['id']}});"
                                class="inline-block bg-red-500 text-white text-xs font-semibold rounded-full px-3 py-1 flex items-center space-x-1 hover:bg-red-600 transition">
                                <i class="fa fa-close" aria-hidden="true"></i><span>Reject</span>
                            </a>
                            @else
                            <span class="inline-block {{$comment['status'] == 'approved' ? 'bg-green-500' : 'bg-red-500'}} text-white text-xs font-semibold rounded-full px-3 py-1">
                                {{ ucfirst($comment['status']) }}
                            </span>
                            @endif
                        </td>
                        <td class="px-4 py-2 border border-gray-300 text-center">
                            <a href="#" onclick="event.preventDefault(); deletecomment({{$comment['id']}});" class="text-red-500 hover:text-red-700">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
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
                {{ $all_comments->links() }}
            </div>
        </div>
    </div>

    @foreach(['pending', 'approved', 'rejected'] as $status)
    <div id="{{ $status }}" class="tab-content hide">
        <div class="bg-white rounded-lg shadow p-4 overflow-auto">
            <table class="w-full border-collapse border border-gray-300">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="text-left px-4 py-2 border border-gray-300">Sl No.</th>
                        <th class="text-left px-4 py-2 border border-gray-300">Article</th>
                        <th class="text-left px-4 py-2 border border-gray-300">Comment</th>
                        <th class="text-left px-4 py-2 border border-gray-300">Commentator</th>
                        <th class="text-left px-4 py-2 border border-gray-300">Status</th>
                        <th class="text-left px-4 py-2 border border-gray-300">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(${"{$status}_comments"} && count(${"{$status}_comments"}) > 0)
                    @php $sl = 1; @endphp
                    @foreach(${"{$status}_comments"} as $comment)
                    <tr>
                        <td class="px-4 py-2 border border-gray-300">{{$sl++}}</td>
                        <td class="px-4 py-2 border border-gray-300">{{$comment['article_name']}}</td>
                        <td class="px-4 py-2 border border-gray-300">{{$comment['comment']}}</td>
                        <td class="px-4 py-2 border border-gray-300">{{$comment['user_name']}}</td>
                        <td class="px-4 py-2 border border-gray-300">
                            <span class="inline-block {{$status == 'pending' ? 'bg-orange-500' : ($status == 'approved' ? 'bg-green-500' : 'bg-red-500') }} text-white text-xs font-semibold rounded-full px-3 py-1">
                                {{ ucfirst($status) }}
                            </span>
                        </td>
                        <td class="px-4 py-2 border border-gray-300 text-center">
                            <a href="#" onclick="event.preventDefault(); deletecomment({{$comment['id']}});" class="text-red-500 hover:text-red-700">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
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
                {{ ${"{$status}_comments"}->links() }}
            </div>
        </div>
    </div>
    @endforeach
</div>

<script>
    function changestatus(status, article_id) {
        const confirmMessage = `Are you sure you want to ${status} this comment?`;

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
                var level = status === 'approve' ? 'approved' : 'rejected';

                $.ajax({
                    url: '{{ url("Administrator/update_comment_status") }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        article_id: article_id,
                        status: level,
                    },
                    success: function(response) {
                        Swal.fire(
                            'Success!',
                            `The comment has been ${level}.`,
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

    function deletecomment(id) {
        const confirmMessage = `Are you sure you want to delete this comment?`;
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
                    url: '{{ url("Administrator/delete_comment") }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        article_id: id,
                    },
                    success: function(response) {
                        Swal.fire(
                            'Success!',
                            `The comment has been deleted.`,
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