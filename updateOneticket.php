<?php
include $_SERVER['DOCUMENT_ROOT']."/common/connectSQL.php";
session_start();
$sql = "UPDATE ticket SET status='" . $_GET["new_status"] . "' WHERE id=" . $_GET['id_ticket'];
                if (mysqli_query($conn, $sql)) {
                    echo
                    '<form action="//dsagdullin.alwaysdata.net">
                                <div class="alert alert-success" role="alert">
                                    New record created successfully!
                                </div>
                                <div>
                                    <button class="btn btn-outline-success" type="submit">Go to homepage</button>
                                </div>
                            </form>';
                    echo "";
                } else {
                    echo
                    '<form action="//dsagdullin.alwaysdata.net/ticketPages/modifyTicket.php">
                                <div class="alert alert-danger" role="alert">';
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    echo '
                                </div>
                                <div>
                                    <button class="btn btn-outline-success" type="submit">Try again</button>
                                </div>
                            </form>';
                }
                mysqli_close($conn);
                ?>