<?php

/**
 * ProxmoxVE PHP API
 *
 * @copyright 2017 Saleh <Saleh7@protonmail.ch>
 * @license http://opensource.org/licenses/MIT The MIT License.
 */

namespace Proxmox;

// /api2/json/datastore
class Datastore
{
  /**
    * Read snapshots
    * GET /admin/datastore/{name}/snapshots
  */
  public function Snapshots($name)
  {
      return Request::Request("/admin/datastore/$name/snapshots");
  }

  /**
    * list available datastores
    * GET /admin/datastore
  */
  public function List()
  {
      return Request::Request("/admin/datastore/");
  }


  /**
    * Get file from snapshot
    * GET /admin/datastore/{backupname}/download-decoded?backup-id={$backupid}&backup-type=vm&backup-time={$backuptime}&file-name=qemu-server.conf.blob
    * @param string   $poolid
  */
  public function DownloadDecoded($backupname,$backupid,$backuptime,$filename)
  {
      return Request::Request("/admin/datastore/$backupname/download-decoded?backup-id=$backupid&backup-type=vm&backup-time=$backuptime&file-name=$filename");
  }

  /**
    * set groupnotes
    * PUT /admin/datastore/backup/group-notes
    * @param string   $backupname
    * @param string   $backuptype
    * @param int      $backupnid
    * @param string   $notes
  */
  public function GroupNotes($backupname, $backuptype, $backupid, $notes)
  {
  		$data = [
  			'backup-type' => $backuptype,
  			'backup-id' 	=> $backupid,
  			'notes' 			=> $notes
  		];

      return Request::Request("/admin/datastore/$backupname/group-notes", $data, 'PUT');
  }
  
}
