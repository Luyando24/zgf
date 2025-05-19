<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class AbuseReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_number',
        'name',
        'email',
        'phone',
        'location',
        'report_type',
        'subject',
        'description',
        'evidence_file',
        'is_anonymous',
        'status',
        'action_taken',
        'ip_address',
        'user_location',
    ];

    protected $casts = [
        'is_anonymous' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Define possible status values
    public const STATUS_PENDING = 'pending';
    public const STATUS_UNDER_REVIEW = 'under_review';
    public const STATUS_RESOLVED = 'resolved';
    public const STATUS_DISMISSED = 'dismissed';

    // Define possible report types
    public const TYPE_ABUSE = 'abuse';
    public const TYPE_CORRUPTION = 'corruption';
    public const TYPE_DISCRIMINATION = 'discrimination';
    public const TYPE_OTHER = 'other';

    /**
     * Get all available status options
     */
    public static function getStatusOptions(): array
    {
        return [
            self::STATUS_PENDING => 'Pending',
            self::STATUS_UNDER_REVIEW => 'Under Review',
            self::STATUS_RESOLVED => 'Resolved',
            self::STATUS_DISMISSED => 'Dismissed',
        ];
    }

    /**
     * Get all available report type options
     */
    public static function getReportTypeOptions(): array
    {
        return [
            self::TYPE_ABUSE => 'Abuse',
            self::TYPE_CORRUPTION => 'Corruption',
            self::TYPE_DISCRIMINATION => 'Discrimination',
            self::TYPE_OTHER => 'Other',
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($report) {
            if (empty($report->reference_number)) {
                $report->reference_number = static::generateUniqueReferenceNumber();
            }
        });
    }

    public static function generateUniqueReferenceNumber(): string
    {
        do {
            $prefix = 'AR';
            $year = now()->format('Y');
            $random = strtoupper(Str::random(6));
            $reference = "{$prefix}-{$year}-{$random}";
        } while (static::where('reference_number', $reference)->exists());

        return $reference;
    }
}