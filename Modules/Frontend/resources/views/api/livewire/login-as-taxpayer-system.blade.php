<div>
    <div class="card mb-1">
        <div class="card-header">
            Login as Taxpayer
        </div>
        <div class="card-body">
            <h5 class="card-title">Login Credential (Setting Share For Below APIs)</h5>
            <p class="card-text"><a href="https://sdk.myinvois.hasil.gov.my/api/07-login-as-taxpayer-system/" target="_blank">LHDN Reference</a> </p>

            <div class="mb-3">
                <label class="form-label">Client ID</label>
                <input type="text" class="form-control" wire:model="clientId" placeholder="">
            </div>
            <div class="mb-3">
                <label class="form-label">Client Secret</label>
                <input type="text" class="form-control" wire:model="clientSecret" placeholder="">
            </div>
            <button type="button" class="mb-2 btn btn-primary w-100" wire:click="testGetToken">Set Credential & Test</button>
            <div class="mb-3">
                <label class="form-label">Expiry</label>
                <input type="text" class="form-control" wire:model="respondTokenExpiry" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Respond - Token</label>
                <textarea class="form-control" rows="15" wire:model="respondToken" readonly></textarea>
            </div>
        </div>
    </div>
    <div class="card mb-1">
        <div class="card-header">
            Test API
        </div>
        <ul class="nav nav-tabs" id="myTab" role="tablist" wire:ignore>
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="get-all-document-types-tab" data-bs-toggle="tab" data-bs-target="#get-all-document-types" type="button" role="tab" aria-controls="get-all-document-types" aria-selected="true">Get All Document Types</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="get-document-type-tab" data-bs-toggle="tab" data-bs-target="#get-document-type" type="button" role="tab" aria-controls="get-document-type" aria-selected="false">Get Document Type</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="get-document-type-version-tab" data-bs-toggle="tab" data-bs-target="#get-document-type-version" type="button" role="tab" aria-controls="get-document-type-version" aria-selected="false">Get Document Type Version</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="get-notifications-tab" data-bs-toggle="tab" data-bs-target="#get-notifications" type="button" role="tab" aria-controls="get-notifications" aria-selected="false">Get Notifications</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="validate-taxpayers-tin-tab" data-bs-toggle="tab" data-bs-target="#validate-taxpayers-tin" type="button" role="tab" aria-controls="validate-taxpayers-tin" aria-selected="false">Validate Taxpayer's TIN</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="submit-documents-tab" data-bs-toggle="tab" data-bs-target="#submit-documents" type="button" role="tab" aria-controls="submit-documents" aria-selected="false">Submit Documents - Invoice v1.0</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="cancel-document-tab" data-bs-toggle="tab" data-bs-target="#cancel-document" type="button" role="tab" aria-controls="cancel-document" aria-selected="false">Cancel Document</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="reject-document-tab" data-bs-toggle="tab" data-bs-target="#reject-document" type="button" role="tab" aria-controls="reject-document" aria-selected="false">Reject Document</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="get-recent-documents-tab" data-bs-toggle="tab" data-bs-target="#get-recent-documents" type="button" role="tab" aria-controls="get-recent-documents" aria-selected="false">Get Recent Documents</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="get-submissions-tab" data-bs-toggle="tab" data-bs-target="#get-submissions" type="button" role="tab" aria-controls="get-submissions" aria-selected="false">Get Submissions</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="get-document-tab" data-bs-toggle="tab" data-bs-target="#get-document" type="button" role="tab" aria-controls="get-document" aria-selected="false">Get Document</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="get-document-details-tab" data-bs-toggle="tab" data-bs-target="#get-document-details" type="button" role="tab" aria-controls="get-document-details" aria-selected="false">Get Document Details</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="search-documents-tab" data-bs-toggle="tab" data-bs-target="#search-documents" type="button" role="tab" aria-controls="search-documents" aria-selected="false">Search Documents</button>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">

            {{-- Get All Document Types --}}
            <div class="tab-pane fade show active" wire:ignore.self id="get-all-document-types" role="tabpanel" aria-labelledby="get-all-document-types-tab">
                <div class="card-body">
                    <p class="card-text"><a href="https://sdk.myinvois.hasil.gov.my/api/03-get-document-types/" target="_blank">LHDN Reference</a> </p>

                    <button type="button" class="mb-2 btn btn-primary w-100" wire:click="testGetAllDocumentTypes">Test</button>
                    <div class="mb-3">
                        <label class="form-label">Respond Status</label>
                        <input type="text" class="form-control" rows="8" wire:model="respondStatus" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Respond Body</label>
                        <textarea class="form-control" rows="15" wire:model="respondBody" readonly></textarea>
                    </div>
                </div>
            </div>

            {{-- Get Document Type --}}
            <div class="tab-pane fade" wire:ignore.self id="get-document-type" role="tabpanel" aria-labelledby="get-document-type-tab">
                <div class="card-body">
                    <p class="card-text"><a href="https://sdk.myinvois.hasil.gov.my/api/04-get-document-type/" target="_blank">LHDN Reference</a> </p>
                    <div class="mb-3">
                        <label class="form-label">Document #, eg. 45</label>
                        <input type="text" class="form-control" wire:model="documentId">
                    </div>
                    <button type="button" class="mb-2 btn btn-primary w-100" wire:click="testGetDocumentType">Test</button>
                    <div class="mb-3">
                        <label class="form-label">Respond Status</label>
                        <input type="text" class="form-control" rows="8" wire:model="respondStatus" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Respond Body</label>
                        <textarea class="form-control" rows="15" wire:model="respondBody" readonly></textarea>
                    </div>
                </div>
            </div>

            {{-- Get Document Type Version --}}
            <div class="tab-pane fade" wire:ignore.self id="get-document-type-version" role="tabpanel" aria-labelledby="get-document-type-version-tab">
                <div class="card-body">
                    <p class="card-text"><a href="https://sdk.myinvois.hasil.gov.my/api/05-get-document-type-version/" target="_blank">LHDN Reference</a> </p>

                    <div class="mb-3">
                        <label class="form-label">Document #, eg. 45</label>
                        <input type="text" class="form-control" wire:model="documentId">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Document Version #, eg. 41235</label>
                        <input type="text" class="form-control" wire:model="documentId">
                    </div>

                    <button type="button" class="mb-2 btn btn-primary w-100" wire:click="testDocumentTypeVersion">Test</button>
                    <div class="mb-3">
                        <label class="form-label">Respond Status</label>
                        <input type="text" class="form-control" rows="8" wire:model="respondStatus" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Respond Body</label>
                        <textarea class="form-control" rows="15" wire:model="respondBody" readonly></textarea>
                    </div>
                </div>
            </div>

            {{-- Get Notifications --}}
            <div class="tab-pane fade" wire:ignore.self id="get-notifications" role="tabpanel" aria-labelledby="get-notifications-tab">
                <div class="card-body">
                    <p class="card-text"><a href="https://sdk.myinvois.hasil.gov.my/api/06-get-notifications/" target="_blank">LHDN Reference</a> </p>

                    <div class="row">
                        <div class="col">
                            <div class="mb-2">
                                <label class="form-label">Date From</label>
                                <input type="datetime-local" class="form-control" wire:model="queryDateFrom">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-2">
                                <label class="form-label">Date To</label>
                                <input type="datetime-local" class="form-control" wire:model="queryDateTo">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-2">
                                <label class="form-label">Notification Type <a class="text-danger" href="https://sdk.myinvois.hasil.gov.my/api/06-get-notifications/#notification-types" target="_blank">** Not Ready</a></label>
                                <input type="text" class="form-control" wire:model="queryType">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-2">
                                <label class="form-label">Language</label>
                                <select class="form-control" wire:model="queryLanguage">
                                    <option value="ms">Bahasa Malaysia (ms)</option>
                                    <option value="en">Bahasa Ingris (en)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-2">
                                <label class="form-label">Status</label>
                                <select class="form-control" wire:model="queryStatus">
                                    <option value="pending">pending</option>
                                    <option value="batched">batched</option>
                                    <option value="delivered">delivered</option>
                                    <option value="error">error</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-2">
                                <label class="form-label">Channel</label>
                                <select class="form-control" wire:model="queryChannel">
                                    <option value="email">email</option>
                                    <option value="push">push</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-2">
                                <label class="form-label">Page No.</label>
                                <input type="text" class="form-control" wire:model="queryPage">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-2">
                                <label class="form-label">Page Size (100 max)</label>
                                <input type="text" class="form-control" wire:model="queryPageSize">
                            </div>
                        </div>
                    </div>

                    <button type="button" class="mb-2 btn btn-primary w-100" wire:click="testGetNotifications">Test</button>
                    <div class="mb-3">
                        <label class="form-label">Respond Status</label>
                        <input type="text" class="form-control" rows="8" wire:model="respondStatus" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Respond Body</label>
                        <textarea class="form-control" rows="15" wire:model="respondBody" readonly></textarea>
                    </div>
                </div>
            </div>

            {{-- Validate Taxpayers Tin --}}
            <div class="tab-pane fade" id="validate-taxpayers-tin" role="tabpanel" aria-labelledby="validate-taxpayers-tin-tab">
                <div class="card-body">
                    <p class="card-text"><a href="https://sdk.myinvois.hasil.gov.my/einvoicingapi/01-validate-taxpayer-tin/" target="_blank">LHDN Reference</a> </p>

                    <div class="mb-3">
                        <label class="form-label">TIN</label>
                        <input type="text" class="form-control" wire:model="tin">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">ID Type</label>
                        <select class="form-control" wire:model="tinType">
                            <option value="NRIC">NRIC</option>
                            <option value="PASSPORT">PASSPORT</option>
                            <option value="BRN">BRN</option>
                            <option value="ARMY">ARMY</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">ID Value</label>
                        <input type="text" class="form-control" wire:model="tinValue">
                    </div>

                    <button type="button" class="mb-2 btn btn-primary w-100" wire:click="testValidateTaxpayersTin">Test</button>
                    <div class="mb-3">
                        <label class="form-label">Respond Status</label>
                        <input type="text" class="form-control" rows="8" wire:model="respondStatus" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Respond Body</label>
                        <textarea class="form-control" rows="15" wire:model="respondBody" readonly></textarea>
                    </div>
                </div>
            </div>

            {{-- Submit Documents - Invoice --}}
            <div class="tab-pane fade" wire:ignore.self id="submit-documents" role="tabpanel" aria-labelledby="submit-documents-tab">
                <div class="card-body">
                    <p class="card-text"><a href="https://sdk.myinvois.hasil.gov.my/documents/invoice-v1-0/" target="_blank">LHDN Reference</a> </p>

                    <div class="mb-3">
                        <label class="form-label">Select Which Structure</label>
                        <select class="form-control" wire:model="jsonxml">
                            <option value="">Select...</option>
                            <option value="JSON">JSON</option>
                            <option value="XML">XML</option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Select TIN Type</label>
                                <select class="form-control" wire:model="supplierType">
                                    <option value="">Select...</option>
                                    <option value="BRN">BRN</option>
                                    <option value="NRIC">NRIC</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Supplier TIN</label>
                                <input class="form-control" wire:model="supplierTin">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Supplier TIN Value</label>
                                <input class="form-control" wire:model="supplierTinValue">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Supplier Email * you need this to see system email</label>
                                <input class="form-control" wire:model="supplierEmail">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Select TIN Type</label>
                                <select class="form-control" wire:model="buyerType">
                                    <option value="">Select...</option>
                                    <option value="BRN">BRN</option>
                                    <option value="NRIC">NRIC</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Buyer TIN</label>
                                <input class="form-control" wire:model="buyerTin">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Buyer TIN Value</label>
                                <input class="form-control" wire:model="buyerTinValue">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Buyer Email * you need this to see system email</label>
                                <input class="form-control" wire:model="buyerEmail">
                            </div>
                        </div>
                    </div>

                    <button type="button" class="mb-2 btn btn-primary w-100" wire:click="testDocumentSubmission">Test</button>
                    <div class="mb-3">
                        <label class="form-label">JSON / XML structure</label>
                        <textarea class="form-control" rows="15" wire:model="requestBody" readonly></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Respond Status</label>
                        <input type="text" class="form-control" rows="8" wire:model="respondStatus" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Respond Body</label>
                        <textarea class="form-control" rows="15" wire:model="respondBody" readonly></textarea>
                    </div>
                </div>
            </div>

            {{-- Cancel Document --}}
            <div class="tab-pane fade" wire:ignore.self id="cancel-document" role="tabpanel" aria-labelledby="cancel-document-tab">
                <div class="card-body">
                    <p class="card-text"><a href="https://sdk.myinvois.hasil.gov.my/einvoicingapi/03-cancel-document/" target="_blank">LHDN Reference</a> </p>

                    <div class="mb-3">
                        <label class="form-label">Document UUID</label>
                        <input type="text" class="form-control" wire:model="documentUUID">
                    </div>
                    <button type="button" class="mb-2 btn btn-primary w-100" wire:click="testCancelDocument">Test</button>
                    <div class="mb-3">
                        <label class="form-label">Respond Status</label>
                        <input type="text" class="form-control" rows="8" wire:model="respondStatus" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Respond Body</label>
                        <textarea class="form-control" rows="15" wire:model="respondBody" readonly></textarea>
                    </div>
                </div>
            </div>

            {{-- Reject Document --}}
            <div class="tab-pane fade" wire:ignore.self id="reject-document" role="tabpanel" aria-labelledby="reject-document-tab">
                <div class="card-body">
                    <p class="card-text"><a href="https://sdk.myinvois.hasil.gov.my/einvoicingapi/04-reject-document/" target="_blank">LHDN Reference</a> </p>

                    <div class="mb-3">
                        <label class="form-label">Document UUID</label>
                        <input type="text" class="form-control" wire:model="documentUUID">
                    </div>
                    <button type="button" class="mb-2 btn btn-primary w-100" wire:click="testRejectDocument">Test</button>
                    <div class="mb-3">
                        <label class="form-label">Respond Status</label>
                        <input type="text" class="form-control" rows="8" wire:model="respondStatus" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Respond Body</label>
                        <textarea class="form-control" rows="15" wire:model="respondBody" readonly></textarea>
                    </div>
                </div>
            </div>

            {{-- Get Recent Documents --}}
            <div class="tab-pane fade" wire:ignore.self id="get-recent-documents" role="tabpanel" aria-labelledby="get-recent-documents-tab">
                <div class="card-body">
                    <p class="card-text"><a href="https://sdk.myinvois.hasil.gov.my/einvoicingapi/05-get-recent-documents/" target="_blank">LHDN Reference</a> </p>

                    <button type="button" class="mb-2 btn btn-primary w-100" wire:click="testGetRecentDocuments">Test</button>
                    <div class="mb-3">
                        <label class="form-label">Respond Status</label>
                        <input type="text" class="form-control" rows="8" wire:model="respondStatus" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Respond Body</label>
                        <textarea class="form-control" rows="15" wire:model="respondBody" readonly></textarea>
                    </div>
                </div>
            </div>

            {{-- Get Submissions --}}
            <div class="tab-pane fade" wire:ignore.self id="get-submissions" role="tabpanel" aria-labelledby="get-submissions-tab">
                <div class="card-body">
                    <p class="card-text"><a href="https://sdk.myinvois.hasil.gov.my/einvoicingapi/06-get-submission/" target="_blank">LHDN Reference</a> </p>

                    <div class="mb-3">
                        <label class="form-label">Submission UUID</label>
                        <input type="text" class="form-control" wire:model="submissionUid">
                    </div>

                    <button type="button" class="mb-2 btn btn-primary w-100" wire:click="testGetSubmission">Test</button>
                    <div class="mb-3">
                        <label class="form-label">Respond Status</label>
                        <input type="text" class="form-control" rows="8" wire:model="respondStatus" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Respond Body</label>
                        <textarea class="form-control" rows="15" wire:model="respondBody" readonly></textarea>
                    </div>
                </div>
            </div>

            {{-- Get Document - only validated document can get --}}
            <div class="tab-pane fade" wire:ignore.self id="get-document" role="tabpanel" aria-labelledby="get-document-tab">
                <div class="card-body">
                    <p class="card-text"><a href="https://sdk.myinvois.hasil.gov.my/einvoicingapi/07-get-document/" target="_blank">LHDN Reference</a> </p>

                    <div class="mb-3">
                        <label class="form-label">Document UUID</label>
                        <input type="text" class="form-control" wire:model="documentUUID">
                    </div>
                    <button type="button" class="mb-2 btn btn-primary w-100" wire:click="testGetDocument">Test</button>
                    <div class="mb-3">
                        <label class="form-label">Respond Status</label>
                        <input type="text" class="form-control" rows="8" wire:model="respondStatus" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Respond Body</label>
                        <textarea class="form-control" rows="15" wire:model="respondBody" readonly></textarea>
                    </div>
                </div>
            </div>

            {{-- Get Document Details --}}
            <div class="tab-pane fade" wire:ignore.self id="get-document-details" role="tabpanel" aria-labelledby="get-document-details-tab">
                <div class="card-body">
                    <p class="card-text"><a href="https://sdk.myinvois.hasil.gov.my/einvoicingapi/08-get-document-details/" target="_blank">LHDN Reference</a> </p>

                    <div class="mb-3">
                        <label class="form-label">Document UUID</label>
                        <input type="text" class="form-control" wire:model="documentUUID">
                    </div>
                    <button type="button" class="mb-2 btn btn-primary w-100" wire:click="testGetDocumentDetails">Test</button>
                    <div class="mb-3">
                        <label class="form-label">Respond Status</label>
                        <input type="text" class="form-control" rows="8" wire:model="respondStatus" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Respond Body</label>
                        <textarea class="form-control" rows="15" wire:model="respondBody" readonly></textarea>
                    </div>
                </div>
            </div>

            {{-- Set Documents --}}
            <div class="tab-pane fade" wire:ignore.self id="search-documents" role="tabpanel" aria-labelledby="search-documents-tab">
                <div class="card-body">
                    <p class="card-text"><a href="https://sdk.myinvois.hasil.gov.my/einvoicingapi/09-search-documents/" target="_blank">LHDN Reference</a> </p>

                    <div class="mb-3">
                        <label class="form-label">Document UUID</label>
                        <input type="text" class="form-control" wire:model="documentUUID">
                    </div>
                    <button type="button" class="mb-2 btn btn-primary w-100" wire:click="testSearchDocuments">Test</button>
                    <div class="mb-3">
                        <label class="form-label">Respond Status</label>
                        <input type="text" class="form-control" rows="8" wire:model="respondStatus" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Respond Body</label>
                        <textarea class="form-control" rows="15" wire:model="respondBody" readonly></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
</div>
