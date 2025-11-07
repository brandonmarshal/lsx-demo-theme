import { useState, useEffect } from '@wordpress/element';
import { __ } from '@wordpress/i18n';
import { Button, TextControl } from '@wordpress/components';
import { useBlockProps } from '@wordpress/block-editor';
import { useEntityProp } from '@wordpress/core-data';
import './style.css';
import './editor.css';

export default function Edit({ attributes, setAttributes, context }) {
    const { facts = [] } = attributes;
    const postType = context.postType;
    const postId = context.postId;
    const blockProps = useBlockProps();
    const [items, setItems] = useState(facts);
    const [meta, setMeta] = useEntityProp('postType', postType, 'meta', postId);

    useEffect(() => {
        setAttributes({ facts: items });
    }, [items]);
    useEffect(() => {
        if (postType === 'fish') {
            const json = JSON.stringify(
                items.filter((f) => f && f.trim().length)
            );
            setMeta({ ...meta, fish_facts: json });
        }
    }, [items]);

    const addFact = () => setItems([...items, '']);
    const updateFact = (value, index) => {
        const next = [...items];
        next[index] = value;
        setItems(next);
    };
    const removeFact = (index) => setItems(items.filter((_, i) => i !== index));

    return (
        <div {...blockProps}>
            <ul
                className="repeatable-facts-editor"
                aria-label={__('Fish facts list', 'fishing-cpt-plugin')}
                role="list"
            >
                {items.map((fact, i) => (
                    <li key={i}>
                        <TextControl
                            label={__('Fact', 'fishing-cpt-plugin')}
                            value={fact}
                            onChange={(v) => updateFact(v, i)}
                        />
                        <Button
                            variant="secondary"
                            onClick={() => removeFact(i)}
                            aria-label={__('Remove fact', 'fishing-cpt-plugin')}
                        >
                            {__('Remove', 'fishing-cpt-plugin')}
                        </Button>
                    </li>
                ))}
            </ul>
            <Button variant="primary" onClick={addFact}>
                {__('Add Fact', 'fishing-cpt-plugin')}
            </Button>
        </div>
    );
}
