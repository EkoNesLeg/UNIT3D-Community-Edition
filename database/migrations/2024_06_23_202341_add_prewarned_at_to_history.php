<?php

declare(strict_types=1);

/**
 * NOTICE OF LICENSE.
 *
 * UNIT3D Community Edition is open-sourced software licensed under the GNU Affero General Public License v3.0
 * The details is bundled with this project in the file LICENSE.txt.
 *
 * @project    UNIT3D Community Edition
 *
 * @author     HDVinnie <hdinnovations@protonmail.com>
 * @license    https://www.gnu.org/licenses/agpl-3.0.en.html/ GNU Affero General Public License v3.0
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('history', function (Blueprint $table): void {
            $table->timestamp('prewarned_at')->nullable()->after('hitrun');
            $table->dropIndex('history_idx_prewa_hitru_immun_activ_actua');
            $table->dropColumn('prewarn');
            $table->index(['prewarned_at', 'hitrun', 'immune', 'active', 'actual_downloaded'], 'history_idx_prewa_hitru_immun_activ_actua');
        });
    }
};
