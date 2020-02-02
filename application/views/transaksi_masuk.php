
<div class="col-lg-12">
<?= $this->session->flashdata('notif'); ?>
						<div class="card">
							<div class="card-body">
								<div class="card-title">
									<h4>Transaksi Masuk</h4>
								</div>
								<div class="table-responsive">
									<table class="table table-hover">
										<thead>
											<tr style="background-color: #324cdd; color:white;">
												<th class="text-center">#</th>
												<th class="text-center">Nama</th>
												<th class="text-center">Qty</th>
												<th class="text-center">Status</th>
												<th class="text-center">Tanggal</th>
												
											</tr>
										</thead>
										<tbody>
										
										<?php $no=1; foreach($transaksi as $a) { ?>
											<tr>
												<th class="text-center"><?= $no++; ?></th>
												<td class="text-center"><?= $a['nama_user']; ?></td>
												<td class="text-center"><?= $a['qty'] ?></td>
												<td class="text-center">
                                                    <button type="button" class="btn btn-sm btn-warning">
                                                        <?= $a['status'] ?>
                                                    </button>
                                                </td>
												<td class="text-center"><?= date('d M Y',$a['tanggal'] ) ?></td>
											</tr>
										<?php } ?>
											
                                        </tbody>
									</table>
								</div>
							</div>
                            <button class="btn btn-block btn-primary sweet-success" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-fw fa-plus-circle"></i> Tambah Admin</button>
						</div>
						<!-- /# card -->
					</div>

					<!-- MODAL TAMBAH ADMIN -->
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="<?=base_url('admin/add_admin')?>" method="post">
								<i class="fa fa-user btn btn-primary btn-sm btn-block"> Nama</i>
								<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required><br>
								<i class="fa fa-envelope-square btn btn-primary btn-sm btn-block"> Email</i>
								<input type="email" name="email" class="form-control" placeholder="Email" required><br>
								<i class="fa fa-lock btn btn-primary btn-sm btn-block"> Password</i>             
								<input type="password" name="password" class="form-control" placeholder="Password" required><br>
								<!-- <i class="fa fa-unlock btn btn-primary btn-sm btn-block"> Repeat Password</i>			 
								<input type="text" name="username" class="form-control" placeholder="Repeat Password" required matches[telepon]> -->
							
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save</button>
						</div>
						</form>
						</div>
					</div>
					</div>
					<!-- END MODAL TAMBAH ADMIN -->


					<!-- MODAL HAPUS -->
					<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalCenterTitle">Hapus Admin</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<b>*Anda yakin akan menghapus akun admin ?</b>
						</div>
						<div class="modal-footer">
							
							<a href="<?= base_url('admin/delete_admin'); ?>/<?= $a->id_admin ?>" class="btn btn-danger">Hapus</a>
						</div>
						</div>
					</div>
					</div>
					<!-- END MODAL HAPUS -->


