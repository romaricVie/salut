
<section class="w-full min-h-screen relative bg-white" id="about">
  <!-- Banner -->
  <section 
    x-data="{}"
    x-cloak
    class="w-full bg-gray-300 relative page__banner"
    :class="{ '__xs' : window.innerWidth < 640 }"
  >
    <div class="absolute top-0 left-0 z-10 pt-4 pl-4 select-none">
      <a href="{{ route('dashboard') }}" class="text-lg text-red-700 font-bold">
        <img src="{{asset('/images/logo-img.svg')}}" alt="logo affranchie" class="w-auto h-8 inline">
      </a>
    </div>
    <h1 class="w-full text-center font-black text-xl absolute transform -translate-y-1/2 -translate-x-1/2 text-white md:text-3xl banner__title">Qui sommes-nous ?</h1>
    <div class="w-full max-w-md mx-auto bg-gray-800 p-2 rounded shadow-md absolute transform -translate-x-1/2 -translate-y-20 sm:-translate-y-full sm:bg-white sm:p-3">
    </div>
  </section>
      
  <!-- Message -->
  <article class="max-w-screen-md mx-auto py-6 md:py-16 px-2 text-gray-800 text-center">
    <article class="mb-6">
      <h1 class="text-lg md:text-2xl font-black">Affranchie</h1>
      <p class="text-sm md:text-base font-normal">Affranchie est un réseau social Chrétien dédié à l'évangélisation et à l'enseignement. Affranchie n'est pas une église mais se tient au service des individus et de toutes les églises chrétiennes partout dans le monde pour la gloire de notre Seigneur Jésus-Christ.</p>
    </article>

    <article class="mb-6">
      <h1 class="text-lg md:text-2xl font-black">Notre mission</h1>
      <p class="text-sm md:text-base font-normal">Notre mission est de contribuer à l'évangélisation et à l'enseignement par l'utilisation des Nouvelles Technologies de l'Information et de la Communication (NTIC). Elle tire sa source dans le livre de Matthieu 28:19-20: << Allez, faites de toutes les nations des disciples, les baptisant au nom du Père, du Fils et du Saint-Esprit,<br> et enseignez-leur à observer tout ce que je vous ai prescrit. Et voici, je suis avec vous tous les jours, jusqu'à la fin du monde.>> </p>
    </article>

    <article class="mb-6">
      <h1 class="text-lg md:text-2xl font-black">Notre vision</h1>
      <p class="text-sm md:text-base font-normal">Notre vision est d'œuvrer afin qu'il y ait pleins d'élus pour le Royaume des cieux.</p>
    </article>

    <article class="mb-6">
      <h1 class="text-lg md:text-2xl font-black">Notre objectif</h1>
      <p class="text-sm md:text-base font-normal">Notre objectif est de créer une grande communauté virtuelle  solidaire attachée à Jésus-Christ.</p>
    </article>

    <article class="mb-6">
      <h1 class="text-lg md:text-2xl font-black">Notre Slogan</h1>
      <p class="text-sm md:text-base font-normal">Jésus, notre modèle.</p>
    </article> 
  </article>
</section> 