import { useEntityProp } from '@wordpress/core-data';
import { useBlockProps } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import './style.css';
import './editor.css';

export default function Edit({ context }) {
    const postId = context.postId;
    const [meta] = useEntityProp('postType', 'stories', 'meta', postId);
    const location = meta?.location;
    const weather = meta?.weather_conditions;
    const success = meta?.catch_success;
    return (
        <div {...useBlockProps()} className="story-card-block">
            <strong>{__('Story Card', 'fishing-cpt-plugin')}</strong>
            <ul>
                <li>
                    {__('Location:', 'fishing-cpt-plugin')} {location || '—'}
                </li>
                <li>
                    {__('Weather:', 'fishing-cpt-plugin')} {weather || '—'}
                </li>
                <li>
                    {__('Catch Success:', 'fishing-cpt-plugin')}{' '}
                    {success || '—'}
                </li>
            </ul>
        </div>
    );
}
