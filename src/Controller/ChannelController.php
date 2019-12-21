<?php

namespace App\Controller;

use App\Entity\Channel;
use App\Form\ChannelType;
use App\Repository\ChannelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/channel")
 */
class ChannelController extends AbstractController
{
    /**
     * @Route("/", name="route_channel_index", methods={"GET"})
     */
    public function index(ChannelRepository $channelRepository): Response
    {
        return $this->render('channel/index.html.twig', [
            'channels' => $channelRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="route_channel_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $channel = new Channel();
        $form = $this->createForm(ChannelType::class, $channel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($channel);
            $entityManager->flush();

            return $this->redirectToRoute('route_channel_index');
        }

        return $this->render('channel/new.html.twig', [
            'channel' => $channel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="route_channel_show", methods={"GET"})
     */
    public function show(Channel $channel): Response
    {
        return $this->render('channel/show.html.twig', [
            'channel' => $channel,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="route_channel_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Channel $channel): Response
    {
        $form = $this->createForm(ChannelType::class, $channel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('route_channel_index');
        }

        return $this->render('channel/edit.html.twig', [
            'channel' => $channel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="route_channel_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Channel $channel): Response
    {
        if ($this->isCsrfTokenValid('delete'.$channel->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($channel);
            $entityManager->flush();
        }

        return $this->redirectToRoute('route_channel_index');
    }
}
