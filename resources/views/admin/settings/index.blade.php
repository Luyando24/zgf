<!-- SEO Settings Tab -->
<div class="tab-pane fade" id="seo-settings" role="tabpanel" aria-labelledby="seo-settings-tab">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">SEO Settings</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="meta_title" class="form-label">Meta Title</label>
                <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ old('meta_title', $settings->meta_title ?? '') }}">
                <div class="form-text">Default title for all pages (if not specified)</div>
            </div>
            
            <div class="mb-3">
                <label for="meta_description" class="form-label">Meta Description</label>
                <textarea class="form-control" id="meta_description" name="meta_description" rows="3">{{ old('meta_description', $settings->meta_description ?? '') }}</textarea>
                <div class="form-text">Default description for all pages (if not specified)</div>
            </div>
            
            <div class="mb-3">
                <label for="meta_keywords" class="form-label">Meta Keywords</label>
                <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="{{ old('meta_keywords', $settings->meta_keywords ?? '') }}">
                <div class="form-text">Comma-separated keywords</div>
            </div>
            
            <div class="mb-3">
                <label for="og_image" class="form-label">Default Social Image</label>
                <input type="file" class="form-control" id="og_image" name="og_image">
                @if(isset($settings->og_image))
                    <div class="mt-2">
                        <img src="{{ Storage::url($settings->og_image) }}" alt="OG Image" class="img-thumbnail" style="max-height: 100px">
                    </div>
                @endif
                <div class="form-text">Recommended size: 1200x630 pixels</div>
            </div>
            
            <div class="mb-3">
                <label for="google_analytics_id" class="form-label">Google Analytics ID</label>
                <input type="text" class="form-control" id="google_analytics_id" name="google_analytics_id" value="{{ old('google_analytics_id', $settings->google_analytics_id ?? '') }}">
                <div class="form-text">Example: G-XXXXXXXXXX or UA-XXXXXXXX-X</div>
            </div>
            
            <div class="mb-3">
                <label for="header_scripts" class="form-label">Header Scripts</label>
                <textarea class="form-control" id="header_scripts" name="header_scripts" rows="4">{{ old('header_scripts', $settings->header_scripts ?? '') }}</textarea>
                <div class="form-text">Additional scripts to include in the head section (Google Tag Manager, etc.)</div>
            </div>
            
            <div class="mb-3">
                <label for="footer_scripts" class="form-label">Footer Scripts</label>
                <textarea class="form-control" id="footer_scripts" name="footer_scripts" rows="4">{{ old('footer_scripts', $settings->footer_scripts ?? '') }}</textarea>
                <div class="form-text">Additional scripts to include before closing body tag</div>
            </div>
        </div>
    </div>
</div>