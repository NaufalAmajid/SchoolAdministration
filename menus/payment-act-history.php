<!-- TRANSACTIONS -->
<h5 class="card-header">Riwayat Pembayaran</h5>
<div class="card-body">
    <span>Silahkan Cari Data Riwayat Berdasarkan Form Dibawah ini.
        <span class="notificationRequest"><strong>Request Permission</strong></span></span>
    <div class="error"></div>
</div>
<div class="table-responsive">
    <table class="table table-striped table-borderless border-bottom">
        <thead>
            <tr>
                <th class="text-nowrap">Type</th>
                <th class="text-nowrap text-center">✉️ Email</th>
                <th class="text-nowrap text-center">🖥 Browser</th>
                <th class="text-nowrap text-center">👩🏻‍💻 App</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-nowrap">New for you</td>
                <td>
                    <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" type="checkbox" id="defaultCheck1" checked />
                    </div>
                </td>
                <td>
                    <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" type="checkbox" id="defaultCheck2" checked />
                    </div>
                </td>
                <td>
                    <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" type="checkbox" id="defaultCheck3" checked />
                    </div>
                </td>
            </tr>
            <tr>
                <td class="text-nowrap">Account activity</td>
                <td>
                    <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" type="checkbox" id="defaultCheck4" checked />
                    </div>
                </td>
                <td>
                    <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" type="checkbox" id="defaultCheck5" checked />
                    </div>
                </td>
                <td>
                    <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" type="checkbox" id="defaultCheck6" checked />
                    </div>
                </td>
            </tr>
            <tr>
                <td class="text-nowrap">A new browser used to sign in</td>
                <td>
                    <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" type="checkbox" id="defaultCheck7" checked />
                    </div>
                </td>
                <td>
                    <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" type="checkbox" id="defaultCheck8" checked />
                    </div>
                </td>
                <td>
                    <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" type="checkbox" id="defaultCheck9" />
                    </div>
                </td>
            </tr>
            <tr>
                <td class="text-nowrap">A new device is linked</td>
                <td>
                    <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" type="checkbox" id="defaultCheck10" checked />
                    </div>
                </td>
                <td>
                    <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" type="checkbox" id="defaultCheck11" />
                    </div>
                </td>
                <td>
                    <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" type="checkbox" id="defaultCheck12" />
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="card-body">
    <h6>When should we send you TRANSACTIONS?</h6>
    <form action="javascript:void(0);">
        <div class="row">
            <div class="col-sm-6">
                <select id="sendNotification" class="form-select" name="sendNotification">
                    <option selected>Only when I'm online</option>
                    <option>Anytime</option>
                </select>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                <button type="reset" class="btn btn-outline-secondary">Discard</button>
            </div>
        </div>
    </form>
</div>
<!-- /TRANSACTIONS -->