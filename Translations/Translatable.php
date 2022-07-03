<?php

namespace Karpack\Contracts\Translations;

interface Translatable
{
    /**
     * Returns all the translations of this model.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function translations();
    
    /**
     * Deletes all the translation models of this model. 
     * 
     * Done by calling the `HasMany`relation, which returns all the translations, and 
     * performing a delete operation on it.
     */
    public function deleteTranslations();

    /**
     * Saves the given translations on the model.
     * 
     * If a translations model exists for the key, then that model is updated, otherwise a 
     * new model is created.
     * 
     * If the second argument `$allow_all_props` is not set to true, only the properties
     * returned in the `$this->properties()` array will be saved. By default, this
     * argument is set to false.
     * 
     * @param array $properties 
     * @param bool $allowAllProps
     */
    public function saveTranslations(array $properties, $localeId, $allowAllProps = false);

    /**
     * Returns the keys/properties that can have different translations.
     * 
     * @return array
     */
    public function translationKeys();
}