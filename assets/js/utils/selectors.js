import slugify from 'slugify';


export const slugifyTitle = (title) => slugify(title, {
  lower: true,
});

export const getCampaignBySlug = (campaigns, slug) => {
  const campaignFound = campaigns.find((campaign) => {
    const slugForCampaign = slugifyTitle(campaign.name);
   
    return slug === slugForCampaign;
  });

  return campaignFound;
};
