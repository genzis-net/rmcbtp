# Browser Language Detection System

## Overview

This implementation automatically detects the user's browser language preference and redirects them to the appropriate language version of the website. The system defaults to English for all non-French browsers, while French browsers are served the French version.

## How It Works

### 1. Browser Language Detection Middleware (`BrowserLanguageDetection`)

- **Location**: `app/Http/Middleware/BrowserLanguageDetection.php`
- **Purpose**: Intercepts requests to the root URL and redirects based on browser language
- **Logic**:
  - French browsers → `/fr`
  - All other languages → `/en`
  - Remembers user preference in session

### 2. Localization Middleware (`Localization`)

- **Location**: `app/Http/Middleware/Localization.php`
- **Purpose**: Sets the application locale and validates language parameters
- **Features**:
  - Validates language codes (`en`, `fr`)
  - Sets application locale
  - Stores preference in session

### 3. Language Helper (`LanguageHelper`)

- **Location**: `app/Helpers/LanguageHelper.php`
- **Purpose**: Provides utility methods for language handling
- **Methods**:
  - `getCurrentLanguage()` - Get current locale
  - `getLanguageUrl($language)` - Get URL for language switch
  - `isCurrentLanguage($code)` - Check if language is active
  - `getLanguageName($code)` - Get display name for language

## Configuration

### Supported Languages
- **English** (`en`) - Default for non-French browsers
- **French** (`fr`) - For French browsers

### Middleware Registration
The middleware is registered in `app/Http/Kernel.php`:
- `BrowserLanguageDetection` - Global middleware
- `Localization` - Web middleware group

## Usage

### Automatic Detection
When a user visits the root URL (`/`), the system:
1. Reads the `Accept-Language` header
2. Checks if French is the primary language
3. Redirects to `/fr` for French, `/en` for others

### Manual Language Switching
Users can manually switch languages using the language switcher in the header, which uses:
```php
\App\Helpers\LanguageHelper::getLanguageUrl($language)
```

### In Views
```php
// Get current language
{{ app()->getLocale() }}

// Check if current language
@if(\App\Helpers\LanguageHelper::isCurrentLanguage('fr'))
    // French content
@endif

// Get language name
{{ \App\Helpers\LanguageHelper::getLanguageName('fr') }} // Returns "Français"
```

## Testing

### Test Route
Visit `/test-language` to see:
- Current application locale
- Detected browser language
- Session language preference
- Accept-Language header value

### Manual Testing
1. **French Browser**: Set browser language to French → Should redirect to `/fr`
2. **English Browser**: Set browser language to English → Should redirect to `/en`
3. **Other Languages**: Set browser language to Spanish/German/etc. → Should redirect to `/en`

## Route Structure

```
/                    → Redirects based on browser language
/en                  → English version
/fr                  → French version
/en/contact-us       → English contact page
/fr/contact-us       → French contact page
```

## Session Storage

The system stores the user's language preference in the session:
```php
session(['locale' => 'fr']); // For French
session(['locale' => 'en']); // For English
```

This preference is remembered across visits until the session expires.

## Security

- Language codes are validated against allowed values
- Invalid language codes redirect to English (default)
- Admin routes are excluded from language detection

## Future Enhancements

1. **Database Storage**: Store language preference in user profile
2. **More Languages**: Add support for additional languages
3. **Geo-location**: Use IP-based location as fallback
4. **Analytics**: Track language preferences for insights 