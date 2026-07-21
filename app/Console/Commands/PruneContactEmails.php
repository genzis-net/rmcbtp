<?php

namespace App\Console\Commands;

use App\Models\ContactEmail;
use Illuminate\Console\Command;

class PruneContactEmails extends Command
{
    protected $signature = 'contact_emails:prune
                            {--days= : Override CONTACT_EMAIL_RETENTION_DAYS}';

    protected $description = 'Delete contact form inquiries older than the configured retention period';

    public function handle(): int
    {
        $days = (int) ($this->option('days') ?: env('CONTACT_EMAIL_RETENTION_DAYS', 365));

        if ($days < 1) {
            $this->error('Retention days must be at least 1.');

            return self::FAILURE;
        }

        $cutoff = now()->subDays($days);

        $deleted = ContactEmail::query()
            ->where('created_at', '<', $cutoff)
            ->delete();

        $this->info("Deleted {$deleted} contact inquir" . ($deleted === 1 ? 'y' : 'ies') . " older than {$days} days.");

        return self::SUCCESS;
    }
}
