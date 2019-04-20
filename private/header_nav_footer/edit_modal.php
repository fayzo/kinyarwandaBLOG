      <div id="table_form" class="modal fade">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h2 class="modal-title">Users</h2>
                  </div>
                  <div class="modal-body">
                      <div id="edit_Content">
                      <form method="post" enctype="multipart/form-data" id="users_form">
                          <div class="form-group">
                              <input type="hidden" id="post_editRowID" value="0">
                              <label for="Username">Username</label>
                              <input type="text" name="username" class="form-control" id="username" placeholder="Username"
                                  required>
                              <div class="invalid-feedback">
                                  Valid first name is required.
                              </div>

                              <label for="firstName">firstName</label>
                              <input type="text" name="firstname" class="form-control" id="firstname" required>
                              <div class="invalid-feedback">
                                  Valid last name is required.
                              </div>

                              <label for="lastname">Lastname</label>
                              <input class="form-control" name="lastname" id="lastname">
                              <div class="invalid-feedback">
                                  Valid last name is required.
                              </div>

                              <label for="passsword">Password</label>
                              <input class="form-control" name="password" id="password">
                              <div class="invalid-feedback">
                                  Valid last name is required.
                              </div>

                              <label for="email">Email <span class="text-muted">(Optional)</span></label>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">@ </span>
                                  </div>
                                  <input type="email" class="form-control" name="email" id="email"
                                      placeholder="you@example.com" required>
                                  <div class="invalid-feedback">
                                      Please enter a valid email address for shipping updates.
                                  </div>
                              </div>

                              <?php
                               date_default_timezone_set("Africa/Kigali");
                               $currentTimes = time();
                               $dateTime = strftime("%A,%b-%d-%Y %Hh:%Mmin:%Ssec %p",$currentTimes);
                               $dateTimes = strftime("%Y-%m-%d",$currentTimes);
                            //   type="datetime-local"
                               ?>
                              <label for="Date-Time">Date-Time</label>
                              <input type="type" class="form-control" name="date" id="date"
                                  value="<?php echo date('Y-m-d H-i-s'); ?>" readonly>
                              <div class="invalid-feedback">
                                  Please enter your Date-Time.
                              </div>

                              <label for="address2">Address</label>
                              <input type="text" class="form-control" name="address" id="address"
                                  placeholder="Apartment or suite">

                              <label for="country">Country</label>
                              <!-- <select class="custom-select d-block w-100" name="country" id="country" required>
                                  <option value="">Choose...</option>
                                  <option>Rwanda</option>
                                  <option>Burundi</option>
                                  <option>Tanzania</option>
                                  <option>Uganda</option>
                              </select> -->
                              <div id="myDiv">
                              </div>
                              <div class="invalid-feedback">
                                  Please select a valid country.
                              </div>

                              <label for="state">State</label>
                              <select class="custom-select d-block w-100" name="state" id="state" required>
                                  <option value="">Choose...</option>
                                  <option>Kigali</option>
                                  <option>Bujumbura</option>
                                  <option>Dar-Salam</option>
                                  <option>Kampala</option>
                              </select>
                              <div class="invalid-feedback">
                                  Please provide a valid state.
                              </div>
                          </div>
                          <div class="form-group image">
                            <label for="">Upload Picture</label>
                            <input type="file" class="form-control-file" name="image" id="image">
                          </div>
                            <input type="submit" value="submit" class="btn btn-success user_form">
                        </form>
                      </div> <!-- THIS IS EDIT_CONTENT -->

                      <!-- START OF UPLOAD IMAGE CONTENT -->
                      <div id="profile_image">
                          <div class="container">
                              <div class="user-box">
                                  <div class="img-relative">
                                      <!-- Loading image -->
                                      <div class="overlay uploadProcess" style="display: none;">
                                          <div class="overlay-content"><img src="<?php echo BASE_URL_LINK ;?>image/users/users_upload_empty/load.jpg" /></div>
                                      </div>
                                      <!-- Hidden upload form -->
                                      <form method="post" action="<?php echo BASE_URL_PRIVATE;?>core/ajax/users_profile_image.php"  enctype="multipart/form-data"
                                          id="picUploadForm" target="uploadTarget">
                                          
                                          <input type="hidden" name="edit_profile" id="edit_profile" value="" style="display:none" />
                                          <input type="file" name="picture" id="fileInput" style="display:none" />
                                      </form>
                                      <iframe id="uploadTarget" name="uploadTarget" src="#"
                                          style="width:0;height:0;border:0px solid black;"></iframe>
                                      <!-- Image update link -->
                                      <!-- <p class="editLink" `><img src="images/upload_image.png" width="80px" /></p> -->
                                      <a href="javascript:void(0);" class="editLink" id="edit_linkUpload">
                                      <img src="<?php echo BASE_URL_LINK ;?>image/users/users_upload_empty/upload_image.png" width="80px" /></a>
                                      <!-- Profile image -->
                                      <img id="imagePreview" class="imagePreview" width="180px">
                                  </div>
                                  <div class="name">
                                      <h4 id="nameView4"> </h4>
                                  </div>
                              </div>
                              <div class="user-box">
                                  <div class="img-relative">
                                      <!-- Loading image -->
                                      <div class="overlay cover_uploadProcess" style="display: none;">
                                          <div class="overlay-content"><img src="<?php echo BASE_URL_LINK ;?>image/users/users_upload_empty/load.jpg" /></div>
                                      </div>
                                      <!-- Hidden upload form -->
                                      <form method="post" action="<?php echo BASE_URL_PRIVATE;?>core/ajax/users_profile_image.php"  enctype="multipart/form-data"
                                          id="cover_picUploadForm" target="cover_uploadTarget">
                                          
                                          <input type="hidden" name="edit_cover" id="edit_cover" value="" style="display:none" />
                                          <input type="file" name="cover_picture" id="cover_fileInput" style="display:none" />
                                      </form>
                                      <iframe id="cover_uploadTarget" name="cover_uploadTarget" src="#"
                                          style="width:0;height:0;border:0px solid black;"></iframe>
                                      <!-- Image update link -->
                                      <!-- <p class="editLink" `><img src="images/upload_image.png" width="80px" /></p> -->
                                      <a href="javascript:void(0);" class="editLinks" id="edit_linkUpload">
                                      <img src="<?php echo BASE_URL_LINK ;?>image/users/users_upload_empty/upload_image.png" width="80px" /></a>
                                      <!-- Profile image -->
                                      <img id="cover_imagePreview" class="cover_imagePreview" width="180px">
                                  </div>
                                  <div class="name">
                                      <h4 id="cover_nameView4"> </h4>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- END OF UPLOAD IMAGE CONTENT -->

                      <!-- START OF VIEW CONTENT -->
                      <div id="show_Content" style="display:none;">
                          <p><span style="font-weight:bold;font-size:17px;">Image : </span>
                              <img width="60px" id="profile_imageView"></p>
                          <hr>
                          <p><span style="font-weight:bold;font-size:17px;">Username : </span>
                              <span id="usernameView"></span> </p>
                          <hr>
                          <p><span style="font-weight:bold;font-size:17px;">Lastname : </span>
                              <span id="lastnameView"></span> </p>
                          <hr>
                          <p><span style="font-weight:bold;font-size:17px;">Password : </span>
                              <span id="passwordView"></span> </p>
                          <hr>
                          <p><span style="font-weight:bold;font-size:17px;">Email :</span>
                              <span id="emailView"></span></p>
                          <!-- style="overflow-y: scroll; height: 300px;" -->
                          <hr>
                          <p><span style="font-weight:bold;font-size:17px;">Date :</span>
                              <span id="dateView"></span></p>
                          <hr>
                          <p><span style="font-weight:bold;font-size:17px;">Address :</span>
                              <span id="addressView"></span></p>
                          <!-- style="overflow-y: scroll; height: 300px;" -->
                          <hr>
                          <p><span style="font-weight:bold;font-size:17px;">Country :</span>
                              <span id="countryView"></span></p>
                          <!-- style="overflow-y: scroll; height: 300px;" -->
                          <hr>
                          <p><span style="font-weight:bold;font-size:17px;">State :</span>
                              <span id="stateView"></span></p>
                          <!-- style="overflow-y: scroll; height: 300px;" -->
                          <hr>
                      </div>
                    </div> <!-- THiS IS A MODAL BODY -->

                  <div class="modal-footer">
                      <input type="button" class="btn btn-primary" data-dismiss="modal" value="Close" id="closeBtn" >
                      <input type="button" id="save" onclick="manage('addpost')" value="save"
                          class="btn btn-success">
                  </div><!-- THiS IS A MODAL FOOTER -->
                  <div id="err"></div> <!-- error in form -->
              </div><!-- THiS IS A MODAL CONTENT -->
          </div><!-- THiS IS A MODAL DIALOG -->
      </div><!-- THiS IS A MODAL FADE -->