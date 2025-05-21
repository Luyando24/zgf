<!-- SEO Tab -->
<div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">SEO Settings</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="meta_title" class="form-label">Meta Title</label>
                <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ old('meta_title', $post->meta_title ?? '') }}">
                <div class="form-text">Leave blank to use the post title</div>
            </div>
            
            <div class="mb-3">
                <label for="meta_description" class="form-label">Meta Description</label>
                <textarea class="form-control" id="meta_description" name="meta_description" rows="3">{{ old('meta_description', $post->meta_description ?? '') }}</textarea>
                <div class="form-text">Leave blank to use the post excerpt</div>
            </div>
            
            <div class="mb-3">
                <label for="meta_keywords" class="form-label">Meta Keywords</label>
                <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="{{ old('meta_keywords', $post->meta_keywords ?? '') }}">
                <div class="form-text">Comma-separated keywords</div>
            </div>
            
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="enable_schema_markup" name="enable_schema_markup" value="1" {{ old('enable_schema_markup', $post->enable_schema_markup ?? false) ? 'checked' : '' }}>
                <label class="form-check-label" for="enable_schema_markup">Enable Custom Schema Markup</label>
            </div>
            
            <div class="mb-3" id="schema_markup_container" style="{{ old('enable_schema_markup', $post->enable_schema_markup ?? false) ? '' : 'display: none;' }}">
                <label for="schema_markup" class="form-label">Custom Schema Markup (JSON)</label>
                <textarea class="form-control" id="schema_markup" name="schema_markup" rows="6">{{ old('schema_markup', $post->schema_markup ?? '') }}</textarea>
                <div class="form-text">Advanced: Add custom JSON-LD schema markup</div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const enableSchemaMarkup = document.getElementById('enable_schema_markup');
        const schemaMarkupContainer = document.getElementById('schema_markup_container');
        
        enableSchemaMarkup.addEventListener('change', function() {
            schemaMarkupContainer.style.display = this.checked ? '' : 'none';
        });
    });
</script>
@endpush