<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * GET /api/notifications - Get notification history for user
     *
     * Matches Notifications screen in mockup
     */
    public function index(Request $request)
    {
        $notifications = Notification::where('user_id', $request->user()->id)
            ->latest('sent_at')
            ->paginate(20);

        return response()->json([
            'success' => true,
            'data' => $notifications,
        ]);
    }

    /**
     * GET /api/notifications/unread-count - Get unread count
     */
    public function unreadCount(Request $request)
    {
        $count = Notification::where('user_id', $request->user()->id)
            ->where('is_read', false)
            ->count();

        return response()->json([
            'success' => true,
            'data' => [
                'unread_count' => $count,
            ],
        ]);
    }

    /**
     * PUT /api/notifications/{id}/read - Mark notification as read
     */
    public function markAsRead(Request $request, Notification $notification)
    {
        if ($notification->user_id !== $request->user()->id) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized.',
            ], 403);
        }

        $notification->update(['is_read' => true]);

        return response()->json([
            'success' => true,
            'message' => 'Notification marked as read.',
        ]);
    }

    /**
     * PUT /api/notifications/read-all - Mark all as read
     */
    public function markAllAsRead(Request $request)
    {
        Notification::where('user_id', $request->user()->id)
            ->where('is_read', false)
            ->update(['is_read' => true]);

        return response()->json([
            'success' => true,
            'message' => 'All notifications marked as read.',
        ]);
    }

    /**
     * POST /api/notifications/send - Manually trigger a notification (Admin only ideally)
     */
    public function send(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'type' => 'required|in:whatsapp,email,system',
            'event' => 'required|string|max:100',
            'payload' => 'nullable|array',
        ]);

        $notification = Notification::create([
            'user_id' => $request->user_id,
            'type' => $request->type,
            'event' => $request->event,
            'payload' => $request->payload,
            'status' => 'sent',
            'sent_at' => now(),
            'is_read' => false,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Notification generated.',
            'data' => $notification,
        ], 201);
    }
}
