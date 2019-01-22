<?php
/**
 * NOTICE OF LICENSE.
 *
 * UNIT3D is open-sourced software licensed under the GNU General Public License v3.0
 * The details is bundled with this project in the file LICENSE.txt.
 *
 * @project    UNIT3D
 *
 * @license    https://www.gnu.org/licenses/agpl-3.0.en.html/ GNU Affero General Public License v3.0
 * @author     HDVinnie
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->integer('id');
			$table->string('username');
			$table->string('email');
			$table->string('password');
			$table->string('passkey')->index();
			$table->integer('group_id')->index();
			$table->boolean('active')->default(0);
			$table->bigInteger('uploaded')->default(0);
			$table->bigInteger('downloaded')->default(0);
			$table->string('image')->nullable();
			$table->string('title')->nullable();
			$table->string('about', 500)->nullable();
			$table->text('signature')->nullable();
			$table->integer('fl_tokens')->default(0);
			$table->float('seedbonus', 12)->default(0.00);
			$table->integer('invites')->default(0);
			$table->integer('hitandruns')->default(0);
			$table->string('rsskey')->index();
			$table->integer('chatroom_id')->default(1);
			$table->boolean('censor')->default(0);
			$table->boolean('chat_hidden')->default(0);
			$table->boolean('hidden')->default(0);
			$table->boolean('style')->default(0);
			$table->boolean('nav')->default(0);
			$table->boolean('torrent_layout')->default(0);
			$table->boolean('torrent_filters')->default(0)->index();
			$table->string('custom_css')->nullable();
			$table->boolean('ratings')->default(0);
			$table->boolean('can_chat')->default(1);
			$table->boolean('can_comment')->default(1);
			$table->boolean('can_download')->default(1);
			$table->boolean('can_request')->default(1);
			$table->boolean('can_invite')->default(1);
			$table->boolean('can_upload')->default(1);
			$table->boolean('show_poster')->default(0);
			$table->boolean('peer_hidden')->default(0);
			$table->boolean('private_profile')->default(0);
			$table->boolean('stat_hidden')->default(0);
			$table->boolean('twostep')->default(0);
			$table->string('remember_token')->nullable();
			$table->dateTime('last_login')->nullable();
			$table->dateTime('disabled_at')->nullable();
			$table->integer('deleted_by')->nullable();
			$table->string('locale')->default('en');
			$table->integer('chat_status_id')->default(1);
            $table->softDeletes();
            $table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
