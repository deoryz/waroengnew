				<div class="main-box-search">
					<div class="prelatif tengah" style="width: 1009px; min-width: 1009px;">
						<div class="box-search-home">
							
							<form name="search_kategori" action="<?php echo Yii::app()->baseUrl ?>/search/index">
								<div class="box-text-search">
									<div class="inner-field">
										<input type="text" name="t_tujuan" placeholder="Masukkan Tujuan Wisata Anda..." />
									</div>
								</div>
								<div class="box-select-search">
									<div class="inner-field">
										<select name="kategori_search">
											<option value="0">Semua Kategori</option>
											<option value="mobil">Mobil</option>
											<option value="hotel">hotel</option>
											<option value="restaurant">restaurant</option>
											<option value="rental">rental</option>
										</select>
									</div>
								</div>
								<div class="box-submit-search">
									<div class="inner-field">
										<input type="submit" name="submit" value=" "/>
									</div>
								</div>
							</form>
							<div style="clear: both;"></div>
						</div>
					</div>
				</div><!-- End box search -->