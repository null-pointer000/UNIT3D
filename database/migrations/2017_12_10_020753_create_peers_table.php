<?php
/**
 * NOTICE OF LICENSE
 *
 * UNIT3D is open-sourced software licensed under the GNU General Public License v3.0
 * The details is bundled with this project in the file LICENSE.txt.
 *
 * @project    UNIT3D
 * @license    https://choosealicense.com/licenses/gpl-3.0/  GNU General Public License v3.0
 * @author     BluCrew
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePeersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('peers', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->binary('peer_id', 60)->nullable();
			$table->string('md5_peer_id')->nullable();
			$table->string('hash')->nullable();
			$table->string('ip')->nullable();
			$table->smallInteger('port')->unsigned()->nullable();
			$table->string('agent')->nullable();
			$table->bigInteger('uploaded')->unsigned()->nullable();
			$table->bigInteger('downloaded')->unsigned()->nullable();
			$table->bigInteger('left')->unsigned()->nullable();
			$table->boolean('seeder')->nullable();
			$table->timestamps();
			$table->bigInteger('torrent_id')->unsigned()->nullable()->index('fk_peers_torrents1_idx');
			$table->integer('user_id')->nullable()->index('fk_peers_users1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('peers');
	}

}