(function (Drupal, drupalSettings) {
  Drupal.behaviors.frontNews = {
    attach(context) {
      const ul = context.querySelector('#news-feed');
      if (!ul || ul.dataset.bound) return; 
      ul.dataset.bound = '1';

      const url =
        drupalSettings?.front_news?.feedUrl ||
        (drupalSettings?.path?.baseUrl ?? '/') + 'api/news';

      (async () => {
        ul.textContent = 'Loading…';
        try {
          const r = await fetch(url, { credentials: 'same-origin' });
          if (!r.ok) throw new Error('HTTP ' + r.status);
          const data = await r.json();

          ul.innerHTML = '';
          const items = Array.isArray(data)
            ? data
            : (data.events || data.upcoming_events || data.results || data.rows || []);

          if (!items.length) {
            ul.innerHTML = '<li>No news yet.</li>';
            return;
          }

          for (const item of items) {
            const title =
              item?.title?.[0]?.value ??
              item?.title ??
              'Untitled';

            const path =
              item?.path ??
              item?.view_node ??
              item?.url?.[0]?.alias ??
              (item?.nid ? `/node/${item.nid[0]?.value ?? item.nid}` : '#');

            const li = document.createElement('li');
            const a = document.createElement('a');
            a.href = path || '#';
            a.textContent = title;
            li.appendChild(a);
            ul.appendChild(li);
          }
        } catch {
          ul.innerHTML = '<li>Failed to load feed.</li>';
        }
      })();
    }
  };
})(Drupal, drupalSettings);
