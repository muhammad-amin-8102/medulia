<style>
    .panel-custom {
        border: 1px solid #ccc;
        margin-top: 20px;
    }

    .panel-heading-custom {
        background-color: #6c757d;
        color: white;
        padding: 10px;
    }

    .tab-header {
        background-color: #222533;
        color: white;
        padding: 10px;
        cursor: pointer;
    }

    .form-inline .form-group {
        margin-right: 15px;
    }

    .search-icon {
        color: red;
        font-size: 20px;
        cursor: pointer;
    }

    .section-title {
        font-weight: bold;
        margin-top: 15px;
    }

    .form-section {
        border: 1px solid #ccc;
        padding: 15px;
        margin-top: 10px;
        background-color: #f9f9f9;
    }

    .form-section label {
        font-weight: bold;
    }

    .go-back-btn {
        float: right;
        margin: 10px;
    }

    .cpanel .panel-heading span {
        font-size: 18px;
        margin: 15px 10px;
        display: inline-block;
    }
</style>

<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="cpanel panel panel-default panel-custom">
                    <div class="panel-heading panel-heading-custom">
                        <span>HIP Initiating Linking</span>
                        <button class="btn btn-teal btn-sm go-back-btn">Go Back</button>
                    </div>
                    <div class="tab-header">Abha Address/Number</div>
                    <div class="panel-body">
                        <form class="form-inline">
                            <div class="form-group">
                                <label for="abhaType">ABHA Type:</label>
                                <select id="abhaType" class="form-control">
                                    <option>ABHA Address</option>
                                    <option>ABHA Number</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="veer_chaudhary1211@sbx">
                                <!-- <span class="glyphicon glyphicon-search search-icon"></span> -->
                                <button type="button" class="btn btn-primary">Search</button>
                            </div>
                            <div class="form-group">
                                <label for="authMode">Mode(s) of Record Linking:</label>
                                <select id="authMode" class="form-control">
                                    <option>-- Select Auth Mod --</option>
                                </select>
                            </div>
                        </form>
                        <div class="form-section">
                            <h4 class="section-title">Patient Details</h4>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p><label>ABHA Address:</label> </p>
                                    <p><label>Patient Name:</label> </p>
                                    <p><label>Gender:</label> </p>
                                    <p><label>Address:</label> </p>
                                </div>
                                <div class="col-sm-6">
                                    <p><label>ABHA Number:</label> </p>
                                    <p><label>DOB:</label> </p>
                                    <p><label>Mobile No.:</label> </p>
                                    <p><label>Linking:</label> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>