import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, RangeControl, ToggleControl, SelectControl } from '@wordpress/components';
import { __, sprintf } from '@wordpress/i18n';
import { useSelect } from '@wordpress/data';
import './style.css';
import './editor.css';

/**
 * Edit component for Fishing Gallery block.
 *
 * Displays gallery preview in the editor with controls for customization.
 *
 * @param {Object} props - Block properties.
 * @param {Object} props.attributes - Block attributes.
 * @param {Function} props.setAttributes - Function to update attributes.
 * @param {Object} props.context - Block context including postId.
 * @return {JSX.Element} The block edit interface.
 */
export default function Edit({ attributes, setAttributes, context }) {
    const { columns, lightbox, captions, imageSize } = attributes;
    const postId = context.postId || 0;

    // Fetch gallery images from ACF field
    const gallery = useSelect(
        (select) => {
            if (!postId) return [];
            
            const record = select('core').getEditedEntityRecord('postType', context.postType, postId);
            
            // ACF fields with show_in_rest enabled can be accessed via:
            // 1. record.acf (if ACF REST API is enabled)
            // 2. record.meta (if field is registered as post meta with show_in_rest)
            // 3. Direct property on record (depending on ACF configuration)
            
            let galleryData = null;
            
            // Try different access patterns for ACF data
            if (record) {
                // Try ACF property first (ACF REST API v3+)
                if (record.acf && record.acf.fishing_gallery) {
                    galleryData = record.acf.fishing_gallery;
                }
                // Try meta property (if registered as post meta)
                else if (record.meta && record.meta.fishing_gallery) {
                    galleryData = record.meta.fishing_gallery;
                }
                // Try direct property
                else if (record.fishing_gallery) {
                    galleryData = record.fishing_gallery;
                }
            }
            
            if (!galleryData) return [];
            
            // fishing_gallery might be a JSON string or already parsed
            try {
                const parsed = typeof galleryData === 'string' 
                    ? JSON.parse(galleryData) 
                    : galleryData;
                
                return Array.isArray(parsed) ? parsed : [];
            } catch (e) {
                return [];
            }
        },
        [postId, context.postType]
    );

    const blockProps = useBlockProps({
        className: `fishing-gallery fishing-gallery--columns-${columns}`,
    });

    return (
        <>
            <InspectorControls>
                <PanelBody title={__('Gallery Settings', 'fishing-cpt-plugin')} initialOpen={true}>
                    <RangeControl
                        label={__('Columns', 'fishing-cpt-plugin')}
                        value={columns}
                        onChange={(value) => setAttributes({ columns: value })}
                        min={1}
                        max={6}
                        help={__('Number of columns in the gallery grid.', 'fishing-cpt-plugin')}
                    />
                    <SelectControl
                        label={__('Image Size', 'fishing-cpt-plugin')}
                        value={imageSize}
                        options={[
                            { label: __('Thumbnail', 'fishing-cpt-plugin'), value: 'thumbnail' },
                            { label: __('Medium', 'fishing-cpt-plugin'), value: 'medium' },
                            { label: __('Large', 'fishing-cpt-plugin'), value: 'large' },
                            { label: __('Full Size', 'fishing-cpt-plugin'), value: 'full' },
                        ]}
                        onChange={(value) => setAttributes({ imageSize: value })}
                    />
                    <ToggleControl
                        label={__('Enable Lightbox', 'fishing-cpt-plugin')}
                        checked={lightbox}
                        onChange={(value) => setAttributes({ lightbox: value })}
                        help={__('Allow images to be viewed in a lightbox overlay.', 'fishing-cpt-plugin')}
                    />
                    <ToggleControl
                        label={__('Show Captions', 'fishing-cpt-plugin')}
                        checked={captions}
                        onChange={(value) => setAttributes({ captions: value })}
                        help={__('Display image captions below each image.', 'fishing-cpt-plugin')}
                    />
                </PanelBody>
            </InspectorControls>

            <div {...blockProps}>
                <div className="fishing-gallery__header">
                    <h3>{__('Fishing Gallery', 'fishing-cpt-plugin')}</h3>
                    <p className="fishing-gallery__description">
                        {gallery.length > 0
                            ? sprintf(__('%d images in gallery', 'fishing-cpt-plugin'), gallery.length)
                            : __('No images added yet. Add images using the Gallery field below.', 'fishing-cpt-plugin')}
                    </p>
                </div>

                {gallery.length > 0 && (
                    <div 
                        className="fishing-gallery__grid"
                        style={{ gridTemplateColumns: `repeat(${columns}, 1fr)` }}
                    >
                        {gallery.slice(0, 6).map((image, index) => (
                            <div key={image.id || index} className="fishing-gallery__item">
                                <img
                                    src={image.sizes && image.sizes.medium ? image.sizes.medium : image.url}
                                    alt={image.alt || ''}
                                    className="fishing-gallery__image"
                                />
                                {captions && image.caption && (
                                    <p className="fishing-gallery__caption">{image.caption}</p>
                                )}
                            </div>
                        ))}
                        {gallery.length > 6 && (
                            <div className="fishing-gallery__more">
                                +{gallery.length - 6} {__('more', 'fishing-cpt-plugin')}
                            </div>
                        )}
                    </div>
                )}
            </div>
        </>
    );
}
