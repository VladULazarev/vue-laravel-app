<div style='width: 100%;'>
  <div style='max-width: 500px; margin: 0 auto 0 auto;padding: 1em 0.5em 0 0.5em;background: #fff;'>

    <div>
      <img style='width: 100%; height:auto;' src="{{ $message->embed(storage_path('email-images/vue-logo.png')) }}">
    </div>

    <h1 style='color: #1d1743;
      font-size: 1.8em;
      margin: 1em 1em 2em 1em;
      border-bottom: 1px solid #e5e5e5;'>Vue-Laravel App</h1>

    <p style='color: #1d1743; margin: 0 0 1em 1em; line-height: 1.7; font-size: 16px;'>
      Здравствуйте, {{ $name }}.
    </p>

    <p style='color: #404a58;font-size: 16px; margin: 0 0 1em 1em; line-height: 1.7;'>
     Мы получили ваше сообщение.
    </p>

    <p style='color: #404a58;font-size: 16px; margin: 0 1em 3em 1em; line-height: 1.7; text-align: right;'>
      Спасибо.
    </p>


    <p style='color: #050505;font-size: 1em; margin: 2em 0 3em 0em; line-height: 1.7;text-align: center;'>
      <a style='padding: 0.5em 5em;
        display: inline-block;
        color:#fff!important;
        background-color: #ad1473;
        border: none;
        text-decoration: none;
        border-radius: 2px;
        text-align: center;'
        href="https://vue-demo.getyoursite.info">Вернуться на сайт
      </a>
    </p>

  </div>
</div>
