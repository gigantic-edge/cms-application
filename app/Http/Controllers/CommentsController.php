<?php

namespace App\Http\Controllers;

use App\Models\CommentModel;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    //
    public function comments()
    {
        $data['all_comments'] = CommentModel::leftJoin('articles', 'comments.article_id', '=', 'articles.id')
            ->leftJoin('users', 'comments.user_id', '=', 'users.id')
            ->select('comments.*', 'articles.name as article_name', 'users.name as user_name')
            ->where('comments.is_deleted', '0')
            ->orderBy('comments.id', 'DESC')
            ->paginate(10);

        $data['pending_comments'] = CommentModel::leftJoin('articles', 'comments.article_id', '=', 'articles.id')
            ->leftJoin('users', 'comments.user_id', '=', 'users.id')
            ->select('comments.*', 'articles.name as article_name', 'users.name as user_name')
            ->where('comments.is_deleted', '0')
            ->where('comments.status', 'pending')
            ->orderBy('comments.id', 'DESC')
            ->paginate(10);

        $data['approved_comments'] = CommentModel::leftJoin('articles', 'comments.article_id', '=', 'articles.id')
            ->leftJoin('users', 'comments.user_id', '=', 'users.id')
            ->select('comments.*', 'articles.name as article_name', 'users.name as user_name')
            ->where('comments.is_deleted', '0')
            ->where('comments.status', 'approved')
            ->orderBy('comments.id', 'DESC')
            ->paginate(10);

        $data['rejected_comments'] = CommentModel::leftJoin('articles', 'comments.article_id', '=', 'articles.id')
            ->leftJoin('users', 'comments.user_id', '=', 'users.id')
            ->select('comments.*', 'articles.name as article_name', 'users.name as user_name')
            ->where('comments.is_deleted', '0')
            ->where('comments.status', 'rejected')
            ->orderBy('comments.id', 'DESC')
            ->paginate(10);

        $title              = 'Comments';
        $page_name          = 'admin.module.comment.comments';
        echo $this->admin_after_login_layout($title, $page_name, $data);
    }

    public function updateCommentStatus(Request $request)
    {
        $validated = $request->validate([
            'article_id'    => 'required',
            'status'        => 'required',
        ]);
        $comment    = CommentModel::find($request->article_id);
        if (!$comment) {
            return response()->json(['error' => 'Comment not found'], 404);
        }
        $comment->status = $request->status;
        $comment->save();
        return response()->json(['success' => 'Comment status updated successfully']);
    }
    public function deleteComment(Request $request)
    {
        $validated = $request->validate([
            'article_id' => 'required',
        ]);
        $comment = CommentModel::where('id', $request->article_id)->update(['is_deleted' => '1']);
        if ($comment) {
            return response()->json([
                'success' => true,
                'message' => 'Comment deleted successfully.',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete the comment.',
            ], 500);
        }
    }
}
